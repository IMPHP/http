<?php declare(strict_types=1);
/*
 * This file is part of the IMPHP Project: https://github.com/IMPHP
 *
 * Copyright (c) 2016 Daniel Bergløv, License: MIT
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO
 * THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR
 * THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace im\http2;

use im\http2\msg\ContentParser;
use im\io\Stream;
use im\Shift;

/**
 * An implementation of `im\http2\msg\Request`
 * 
 * This implementation will be initiated an populated with data from
 * PHP's superglobals. This includes URI, Host, Uploaded files and more.
 */
class ServerRequest extends Request {

    /**
     *
     */
    public function __construct() {
        parent::__construct("GET", ($uri = new Uri()));

        $supers = [
            "srvName" => "SERVER_NAME",
            "srvHost" => "HTTP_HOST",
            "reqMethod" => "REQUEST_METHOD",
            "reqSSL" => "HTTPS",
            "reqURI" => "REQUEST_URI",
            "reqPort" => "SERVER_PORT",
            "reqScript" => "SCRIPT_NAME",
            "reqOrigURL" => "HTTP_X_ORIGINAL_URL",
            "reqRewrite" => "HTTP_X_REWRITE_URL",
            "reqQS" => "QUERY_STRING"
        ];

        foreach ($supers as $var => $super) {
            ${$var} = !empty($_SERVER[$super]) ? $_SERVER[$super] : null;
        }

        /* ------------------------------------------------
         * Get all headers
         */

        if (function_exists("getallheaders")) {
            foreach (getallheaders() as $key => $value) {
                $this->addHeader($key, $value);
            }

        } else {
            foreach ($_SERVER as $key => $value) {
                if (str_starts_with($key, "HTTP_")) {
                    $this->setHeader(substr(str_replace("_", "-", $key), 5), $value);
                }
            }
        }

        /* ------------------------------------------------
         * Get the request Method
         */

        if ($this->hasHeader("x-http-method-override")) {
            $this->setMethod(
                $this->getHeader("x-http-method-override")->get(0)
            );

        } else if ($reqMethod != null) {
            $this->setMethod($reqMethod);
        }

        /* ------------------------------------------------
         * Get uri information
         */

        $uriAuth = $srvHost ?? $srvName ?? "localhost";
        $uriScheme = Shift::toBoolean($reqSSL ?? "off") ? "https" : "http";
        $uriPath = $reqURI ?? "";
        $uriQS = null;

        if ($reqPort != null) {
            $uriAuth .= ":{$reqPort}";
        }

        if (($pos = strpos($uriPath, "?")) !== false) {
            $uriQS = substr($uriPath, $pos+1);
            $uriPath = substr($uriPath, 0, $pos);
        }

        if ($this->hasHeader("authorization")) {
            $userinfo = $this->getHeader("authorization")->get(0);

            if (strtolower(substr($userinfo, 0, 5)) == "basic") {
                $uriAuth = base64_decode(substr($userinfo, 6))."@".$uriAuth;
            }
        }

        # IIS Fixes
        if ($reqOrigURL != null) {
            # IIS Mod-Rewrite
            $uriQS = preg_replace('/^.+\\?/', '', $reqOrigURL);

        } else if ($reqRewrite != null) {
            # IIS Isapi_Rewrite
            $uriQS = preg_replace('/^.+\\?/', '', $reqRewrite);

        } else if ($reqQS != null) {
            $uriQS = $reqQS;
        }

        $uri->setAuthority($uriAuth);
        $uri->setScheme($uriScheme);
        $uri->setPath($uriPath);

        if ($uriQS != null) {
            $uri->setQuerystring($uriQS);
        }

        /* ------------------------------------------------
         * Get uploaded files
         */

        if (!empty($_FILES)) {
            foreach ($_FILES as $fieldName => $fileInfo) {
                if (is_array($fileInfo["tmp_name"])) {
                    foreach ($fileInfo["tmp_name"] as $pos => $ignore) {
                        $this->addFile(new File(
                            $fieldName,
                            $fileInfo["tmp_name"][$pos],
                            $fileInfo["size"][$pos],
                            $fileInfo["error"][$pos],
                            basename($fileInfo["name"][$pos]),
                            $fileInfo["type"][$pos]
                        ));
                    }

                } else {
                    $this->addFile(new File(
                        $fieldName,
                        $fileInfo["tmp_name"],
                        $fileInfo["size"],
                        $fileInfo["error"],
                        basename($fileInfo["name"]),
                        $fileInfo["type"]
                    ));
                }
            }
        }

        /* ------------------------------------------------
         * Get Parsed Body
         */

        if ($this->hasHeader("content-type")) {
            $type = $this->getHeaderLine("content-type");

            if (($pos = strpos($type, ";")) !== false) {
                $type = substr($type, $pos);
            }

            if (in_array($this->getMethod(), ["POST", "PUT"])
                    && in_array(strtolower($type), ["multipart/form-data", "application/x-www-form-urlencoded"])) {

                $parser = new class() implements ContentParser {
                    public function parse(Stream $stream, string $contentType): mixed {
                        return $_POST;
                    }
                };

                $this->setParser($parser, $type);

            } else if (strtolower($type) == "application/json") {
                $parser = new class() implements ContentParser {
                    public function parse(Stream $stream, string $contentType): mixed {
                        return json_decode($stream->toString(), false);
                    }
                };

                $this->setParser($parser, $type);
            }
        }
    }
}
