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
 * Defines a file that can be attached to a request.
 * These files are typically used for uploaded files.
 */
interface File {

    /**
     * Get an identifiable name
     *
     * @note
     *      On `POST` requests this will be the name of the html element
     *      of the uploaded file.
     */
    function getName(): string;

    /**
     * Checks to see if there is an error code
     *
     * @return bool
     *      `TRUE` if there are no errors
     */
    function isReady(): bool;

    /**
     * Get a stream access to this file
     *
     * The initial file (before it's saved) should have only
     * `r` read access.
     *
     * Whenever it's not possible to create/re-create a stream
     * for some reason, a stream containing an empty temp resource
     * is returned.
     */
    function getStream(): Stream;

    /**
     * Check whether or not this file has been saved
     *
     * If this returns `TRUE` is not a indicator that the
     * file cannot be saved again to another location.
     * It simply means that this is no longer a temp file,
     * since it has been dealed with at least ones.
     * However, if the caller parsed a stream as target,
     * that stream may only have write access.
     *
     * Also note that this method could return `FALSE`
     * even if the file has been saved. Someone could have
     * done so manually using `getStream()`. So the only thing that
     * can be concluded from this value, is whether or not the file
     * stream points at the original temp file or not.
     *
     * @return bool
     *      Returns `TRUE` if `save()` has been called successfully
     */
    function isSaved(): bool;

    /**
     * Get the byte length of the file or stream
     *
     * In cases where the size could not be determined,
     * this method returns `-1`.
     */
    function getLength(): int;

    /**
     * Get the error code
     *
     * Should return `0` when there are no errors
     */
    function getError(): int;

    /**
     * Get the file name provided by the request creator, if any.
     *
     * It's the job of the request creator to provide this information.
     * The implementation is allowed to do further steps to determine this,
     * but is not required to.
     */
    function getClientFilename(): ?string;

    /**
     * Get the file media type provided by the request creator, if any
     *
     * It's the job of the request creator to provide this information.
     * The implementation is allowed to do further steps to determine this,
     * but is not required to.
     */
    function getClientMediaType(): ?string;

    /**
     * Save the content of this included file to a perminent location
     *
     * This is the same as `moveTo()` on the PSR UploadedFile object.
     * This object however is not just intended for uploaded files.
     * It's simply a file or stream that has been included in a request,
     * how and by whom does not mater. And since this includes stream support,
     * the word `save` gives more meaning than `move` because you cannot
     * move a stream, but you can save it's content, just like you can save the
     * content from a file to a different location. What happens to the source
     * file or stream is a task for the request creator.
     *
     * Stream access will shift to the target stream on success. This allows anyone with access
     * to the file object to have access to the target content.
     *
     * @param string|Stream
     *      Target, file or stream to save the content to
     */
    function save(string|Stream $target): bool;
}
