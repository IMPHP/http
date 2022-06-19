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
use Psr\Http\Message\StreamInterface;
use im\io\Stream as IStream;
use im\features\Wrapper;

/**
 * A wrapper allowing you to use `im\io\Stream` as `Psr\Http\Message\StreamInterface`
 */
class Stream implements StreamInterface, Wrapper {

    /** @ignore */
    protected ?IStream $stream;

    /**
     * @param $stream
     *      A stream to use
     */
    public function __construct(IStream $stream) {
        $this->stream = $stream;
    }

    /**
     * Return the original `im\io\Stream`
     */
    #[Override("im\features\Wrapper")]
    public function unwrap(): IStream|null {
        return $this->stream;
    }

    /**
     * Close the underlaying stream
     *
     * @return void
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function close() /*void*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $this->stream->close();
            $this->stream = null;
        }
    }

    /**
     * Detach the underlaying stream, but do not close it
     *
     * @return resource|null
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function detach() /*resource|null*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $resource = $this->stream->getResource();
            $this->stream = null;

            return $resource;
        }

        return null;
    }

    /**
     * Get the size of the stream data in bytes
     *
     * @return int|null
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function getSize() /*int|null*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $size = $this->stream->getLength();

            if ($size != -1) {
                return $size;
            }
        }

        return null;
    }

    /**
     * Get the current pointer position
     *
     * @return int
     * @throws \RuntimeException on failure
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function tell() /*int*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $offset = $this->stream->getOffset();

            if ($offset != -1) {
                return $offset;
            }
        }

        throw new RuntimeException("Unable to read offset from the stream");
    }

    /**
     * Check whether or not this stream has reached EOF
     *
     * @return bool
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function eof() /*bool*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            return $this->stream->isEOF();
        }

        return true;
    }

    /**
     * Check to see if this stream is seekable
     *
     * @return bool
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function isSeekable() /*bool*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            return $this->stream->isSeekable();
        }

        return false;
    }

    /**
     * Check to see if this stream is writable
     *
     * @return bool
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function isWritable() /*bool*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            return $this->stream->isWritable();
        }

        return false;
    }

    /**
     * Check to see if this stream is readable
     *
     * @return bool
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function isReadable() /*bool*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            return $this->stream->isReadable();
        }

        return false;
    }

    /**
     * Seek to a position in the stream
     *
     * @param int $offset
     *      Offset to seek to
     *
     * @param int $whence
     *      Specifies how the cursor position will be calculated
     *
     * @return void
     * @throws \RuntimeException on failure
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function seek(/*int*/ $offset, /*int*/ $whence = SEEK_SET) /*void*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            if ($this->stream->seek($offset, $whence)) {
                return;
            }
        }

        throw new RuntimeException("Unable to seek to offset $offset");
    }

    /**
     * Seek to the beginning of the stream
     *
     * @return void
     * @throws \RuntimeException on failure
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function rewind() /*void*/ {
        $this->seek(0);
    }

    /**
     * Write data to the stream
     *
     * @param string $string
     *      A string to write
     *
     * @return int
     * @throws \RuntimeException on failure
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function write(/*string*/ $string) /*int*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $count = $this->stream->write($string);

            if ($count != -1) {
                return $count;
            }
        }

        throw new RuntimeException("Failed writing to stream");
    }

    /**
     * Read data from the stream
     *
     * @param int $length
     *      The length of bytes to read
     *
     * @return string
     * @throws \RuntimeException on failure
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function read(/*int*/ $length) /*string*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $bytes = $this->stream->read($string);

            if ($bytes !== null) {
                return $bytes;
            }
        }

        throw new RuntimeException("Failed reading from stream");
    }

    /**
     * Returns the remaining contents in the stream
     *
     * @return string
     * @throws \RuntimeException on failure
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function getContents() /*string*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $bytes = "";
            while (($buffer = $this->stream->read(4096)) != null) {
                $bytes .= $buffer;
            }

            if ($buffer !== null) {
                return $bytes;
            }
        }

        throw new RuntimeException("Failed reading from stream");
    }

    /**
     * Get stream metadata as an associative array or retrieve a specific key
     *
     * @param string $key
     *       Specific metadata to retrieve
     *
     * @return array|mixed|null
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function getMetadata(/*string*/ $key = null) /*array|mixed|null*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            $meta = $this->stream->getMetadata();
            $meta = $meta->toArray();

            if ($key != null) {
                return $meta[$key] ?? null;
            }

            return $meta;
        }

        return $key != null ? [] : null;
    }

    /**
     * @php
     */
    #[Override("Psr\Http\Message\StreamInterface")]
    public function __toString() /*string*/ {
        if ($this->stream != null
                && $this->stream->getFlags() > 0) {

            return $this->stream->toString();
        }

        return "";
    }
}
