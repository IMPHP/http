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
use Psr\Http\Message\UploadedFileInterface;
use im\http2\msg\File as IFile;
use im\features\Wrapper;

/**
 * A wrapper allowing you to use `im\http2\msg\File` as `Psr\Http\Message\UploadedFileInterface`
 */
class File implements UploadedFileInterface, Wrapper {

    /** @ignore */
    protected ?IFile $file;

    /**
     * @param $file
     *      A File to use
     */
    public function __construct(IFile $file) {
        $this->file = $file;
    }

    /**
     * Return the original `im\io\Stream`
     */
    #[Override("im\features\Wrapper")]
    public function unwrap(): IFile|null {
        return $this->file;
    }

    /**
     * Retrieve a stream representing the uploaded file
     *
     * @return StreamInterface
     */
    public function getStream() /*StreamInterface*/ {
        return new Stream($this->file->getStream());
    }

    /**
     * Move the uploaded file to a new location
     *
     * @param string $targetPath
     *      Path to which to move the uploaded file
     *
     * @return void
     */
    public function moveTo(/*string*/ $targetPath) /*void*/ {
        if ($this->file->isSaved()) {
            throw new RuntimeException("This file has already been moved");

        } else if (!$this->file->save($targetPath)) {
            throw new RuntimeException("Failed to move the file into $targetPath");
        }
    }

    /**
     * Retrieve the file size
     *
     * @return int|null
     */
    public function getSize() /*int|null*/ {
        $size = $this->file->getLength();

        if ($size == -1) {
            return null;
        }

        return $size;
    }

    /**
     * Retrieve the error associated with the uploaded file
     *
     * @return int
     */
    public function getError() /*int*/ {
        return $this->file->getError();
    }

    /**
     * Retrieve the filename sent by the client
     *
     * @return string|null
     */
    public function getClientFilename() /*string|null*/ {
        return $this->file->getClientFilename();
    }

    /**
     * Retrieve the media type sent by the client
     *
     * @return string|null
     */
    public function getClientMediaType() /*string|null*/ {
        return $this->file->getClientMediaType();
    }
}
