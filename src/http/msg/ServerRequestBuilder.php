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

namespace im\http\msg;

use im\Shift;

/**
 * An implementation of `im\http\msg\RequestBuilder`
 *
 * This builder will be initiated an populated with data from
 * PHP's superglobals. This includes URI, Host, Uploaded files and more.
 */
class ServerRequestBuilder extends HttpRequestBuilder {

    /**
     * @param $parser
     *      Optional parser used to parse the content of the body
     */
    public function __construct(StreamParser $parser = null) {
        parent::__construct("GET", ($uri = new HttpUriBuilder()), $parser);

        /* ------------------------------------------------
         * Get all headers
         */
        if (function_exists("getallheaders")) {
            foreach (getallheaders() as $key => $value) {
                $this->addHeader($key, $value);
            }

        } else {
            foreach ($_SERVER as $key => $value) {
                if (str_starts_with(strtolower($key), "http_")) {
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

        } else if (!empty($_SERVER['REQUEST_METHOD'])) {
            $this->setMethod(
                $_SERVER['REQUEST_METHOD']
            );
        }

        /* ------------------------------------------------
         * Get uri information
         */
        $authority = $_SERVER["HTTP_HOST"] ?? $_SERVER["SERVER_NAME"] ?? "localhost";
        $scheme = Shift::toBoolean($_SERVER["HTTPS"] ?? "off") ? "https" : "http";
        $path = "/".trim($_SERVER["REQUEST_URI"] ?? "", "/");
        $basePath = null;
        $query = null;

        if (!empty($_SERVER["SERVER_PORT"])) {
            $authority .= ":".$_SERVER["SERVER_PORT"];
        }

        if ($this->hasHeader("authorization")) {
            $userinfo = $this->getHeader("authorization")->get(0);

            if (strtolower(substr($userinfo, 0, 5)) == "basic") {
                $authority = base64_decode(substr($userinfo, 6))."@".$authority;
            }
        }

        if (($pos = strpos($path, "?")) !== false) {
            $path = "/".trim(substr($path, 0, $pos), "/");
        }

        if (!empty($_SERVER["SCRIPT_NAME"])) {
            $basePath = dirname($_SERVER["SCRIPT_NAME"]);
            $path = "/".trim(substr($path, strlen($basePath)), "/");

            if (!empty($path) && preg_match("/^(\/\w+\.php)(\/.*)?/", $path, $match)) {
                $basePath = str_replace("//", "/", $basePath.$match[1]);
                $path = !empty($match[2]) ? $match[2] : "/";
            }
        }

        // IIS Fixes
        if (!empty($_SERVER["HTTP_X_ORIGINAL_URL"])) {
            // IIS Mod-Rewrite
            $query = preg_replace('/^.+\\?/', '', $_SERVER["HTTP_X_ORIGINAL_URL"]);

        } else if (!empty($_SERVER["HTTP_X_REWRITE_URL"])) {
            // IIS Isapi_Rewrite
            $query = preg_replace('/^.+\\?/', '', $_SERVER["HTTP_X_REWRITE_URL"]);

        } else if (isset($_SERVER["QUERY_STRING"]) || isset($_SERVER["REQUEST_URI"])) {
            if (!empty($_SERVER["QUERY_STRING"])) {
                $query = $_SERVER["QUERY_STRING"];

            } else if (($pos = strpos($_SERVER["REQUEST_URI"], "?")) !== false) {
                $query = substr($_SERVER["REQUEST_URI"], $pos+1);
            }
        }

        $uri->setAuthority($authority);
        $uri->setScheme($scheme);
        $uri->setPath($path);

        if ($basePath != null) {
            $uri->setBasePath($basePath);
        }

        if ($query != null) {
            $uri->setQuery($query);
        }

        $this->setUri($uri);

        /* ------------------------------------------------
         * Get uploaded files
         */
        if (!empty($_FILES)) {
            foreach ($_FILES as $fieldName => $fileInfo) {
                if (is_array($fileInfo["tmp_name"])) {
                    foreach ($fileInfo["tmp_name"] as $pos => $ignore) {
                        $this->addFile(new HttpFile(
                            $fieldName,
                            $fileInfo["tmp_name"][$pos],
                            $fileInfo["size"][$pos],
                            $fileInfo["error"][$pos],
                            basename($fileInfo["name"][$pos]),
                            $fileInfo["type"][$pos]
                        ));
                    }

                } else {
                    $this->addFile(new HttpFile(
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

            if (($pos = strpos($type, ";")) !== false
                        || ($pos = strpos($type, ",")) !== false) {

                $type = substr($type, $pos);
            }

            if ($this->getMethod() == "POST" && in_array($type, ["multipart/form-data", "application/x-www-form-urlencoded"])) {
                $this->parsedBody = $_POST;
            }
        }
    }
}
