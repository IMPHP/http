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

use im\io\Stream;

/**
 * Defines a parser that is used to parse the request body
 *
 * The request body can come in many forms like JSON,
 * XML, POST Data and more. This interface allows custom parsers to be used
 * to parse data within `im\http\msg\Request`.
 * 
 * @deprecated 
 *      This has been replaced by `im\http2\msg\ContentParser`
 */
interface StreamParser {

    /**
     * Parse data from the body stream
     *
     * @param $body
     *      The stream to parse
     *
     * @param $mime
     *      The mime type of the stream content
     *
     * @return
     *      The parser should return `NULL` if it does not
     *      support parsing the current content of the body.
     */
    function parse(Stream $body, string $mime = null): mixed;
}
