<?php declare(strict_types=1);
/*
 * This file is part of the IMPHP Project: https://github.com/IMPHP
 *
 * Copyright (c) 2022 Daniel Bergløv, License: MIT
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

namespace im\http2\combat\psr7;

use RuntimeException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use im\http2\msg\ContentParser;
use im\features\Wrapper;
use im\io\Stream;

/**
 * A wrapper allowing you to use `im\http2\msg\Request` as `Psr\Http\Message\ServerRequestInterface`
 */
class ServerRequest extends Request implements ServerRequestInterface {

    /** @ignore */
    protected /*array*/ $serverParams = [];

    /** @ignore */
    protected /*array*/ $cookieParams = [];

    /** @ignore */
    protected /*array*/ $queryParams = null;

    /**
     * Retrieve server parameters
     *
     * @note
     *      In this implementation, this will always return an empty array.
     *      The Super Globals does not belong here and as such is not implemented
     *      in the underlaying `im\http2\msg\Request`.
     *
     * @return array
     */
    public function getServerParams() /*array*/ {
        return $this->serverParams;
    }

    /**
     * Retrieve cookies
     *
     * @note
     *      Unless manually specified using `withCookieParams()`,
     *      this method will return an empty array.
     *
     * @return array
     */
    public function getCookieParams() /*array*/ {
        return $this->cookieParams;
    }

    /**
     * Return an instance with the specified cookies
     *
     * @param $cookies
     *      Array of key/value pairs representing cookies
     *
     * @return static
     */
    public function withCookieParams(array $cookies) /*static*/ {
        $self = clone $this;
        $self->cookieParams = $cookies;

        return $self;
    }

    /**
     * Retrieve deserialized query string arguments
     *
     * @return array
     */
     public function getQueryParams() /*array*/ {
         if ($this->queryParams === null) {
             $uri = $this->message->getUri();
             $qs = $uri->getQuerystring();

             if ($qs != null) {
                 parse_str($query, $result);

                 if (is_array($result)) {
                     return $result;
                 }
             }

             return [];
         }

         return $this->queryParams;
     }

     /**
      * Return an instance with the specified query string arguments
      *
      * @param $query
      *      Array of query string arguments
      *
      * @return static
      */
     public function withQueryParams(array $query) /*static*/ {
         $self = clone $this;
         $self->queryParams = $query;

         return $self;
     }

     /**
      * Retrieve normalized file upload data
      *
      * @return array
      */
     public function getUploadedFiles() /*array*/ {
         $list = [];

         foreach ($this->message->getFiles() as $file) {
             $list[] = new File($file);
         }

         return $list;
     }

     /**
      * Create a new instance with the specified uploaded files
      *
      * @param $uploadedFiles
      *     An array tree of UploadedFileInterface instances
      *
      * @return static
      */
     public function withUploadedFiles(array $uploadedFiles) /*static*/ {
         $self = clone $this;
         $self->message->removeFiles();

         foreach ($uploadedFiles as $file) {
             if ($file instanceof UploadedFileInterface
                    && $file instanceof Wrapper) {

                 $self->message->addFile(
                     $file->unwrap()
                 );

             } else {
                 throw new RuntimeException("File must be a wrapper containing a proper im\\http2\\msg\\File");
             }
         }

         return $self;
     }

     /**
      * Retrieve any parameters provided in the request body
      *
      * @return mixed
      */
     public function getParsedBody() /*mixed*/ {
         return $this->message->getParsedData();
     }

     /**
      * Return an instance with the specified body parameters
      *
      * @param mixed $data
      *     The deserialized body data
      *
      * @return static
      */
     public function withParsedBody(/*mixed*/ $data) /*static*/ {
         $self = clone $this;
         $self->setParser(new class($data) implements ContentParser {
             public function __construct(private mixed $data) {}

             public function parse(Stream $stream, string $contentType): mixed {
                 return $this->data;
             }
         });

         return $self;
     }

     /**
      * Retrieve attributes derived from the request
      *
      * @note
      *     This will always return an empty array.
      *     The imphp/http implementation does not support returning all
      *     available atributes. They are application specific and as such, if an
      *     application uses them, it will know what to look for.
      *
      *     Use `getAttribute()` to get specific attributes.
      *
      * @return array
      */
     public function getAttributes() /*array*/ {
         return [];
     }

     /**
      * Retrieve a single derived request attribute
      *
      * @param string $name
      *     The attribute name
      *
      * @param mixed $default
      *     Default value to return if the attribute does not exist
      *
      * @return mixed
      */
     public function getAttribute(/*string*/ $name, /*mixed*/ $default = null) /*mixed*/ {
         return $this->message->getAttribute($name, $default);
     }

     /**
      * Return an instance with the specified derived request attribute
      *
      * @param string $name
      *     The attribute name
      *
      * @param mixed $value
      *     The value of the attribute
      *
      * @return static
      */
     public function withAttribute(/*string*/ $name, /*mixed*/ $value) /*static*/ {
         $self = clone $this;
         $self->setAttribute($name, $value);

         return $self;
     }

     /**
      * Return an instance that removes the specified derived request attribute
      *
      * @param string $name
      *     The attribute name
      *
      * @return static
      */
     public function withoutAttribute(/*string*/ $name) /*static*/ {
         $self = clone $this;
         $self->removeAttribute($name);

         return $self;
     }
}
