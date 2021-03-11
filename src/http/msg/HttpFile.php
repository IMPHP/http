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
use im\io\RawStream;
use im\io\FileStream;
use im\ErrorCatcher;
use Exception;
use Throwable;

/**
 * This class is used mostly for uploaded files.
 *
 * It can however be used for any type of file or even `Stream` objects,
 * though it does not really make much sense outside the usage of the Http package.
 */
class HttpFile implements File {

    /**
     * @internal
     */
    private string $mName;

    /**
     * @internal
     */
    private int $mError;

    /**
     * @internal
     */
    private int $mSize;

    /**
     * @internal
     */
    private ?string $mClientName;

    /**
     * @internal
     */
    private ?string $mClientType;

    /**
     * @internal
     */
    private ?string $mFile;

    /**
     * @internal
     */
    private ?Stream $mStream;

    /**
     * @internal
     */
    private bool $mSaved = false;

    /**
     * @param $name
     *      An identifying name
     *
     * @param $file
     *      File accociated with this class.
     *      This can be a file path or a `Stream`
     *
     * @param $length
     *      Optional, specify the length of the file
     *
     * @param $error
     *      Specify an error code accociated with the file.
     *      This is used when using this class for uploaded files
     *
     * @param $clientName
     *      The name of the original file that was uploaded.
     *      When used for uploaded files
     *
     * @param $clientType
     *      The media type reported by the client.
     *      When used for uploaded files
     */
    public function __construct(string $name, string|Stream $file, int $length=-1, int $error=0, string $clientName=null, string $clientType=null) {
        $this->mName = $name;
        $this->mError = $error;
        $this->mSize = $length;
        $this->mClientName = $clientName;
        $this->mClientType = $clientType;

        if (is_string($file)) {
            $this->mFile = $file;

        } else {
            $this->mStream = $file;

            if (!$this->mStream->isReadable()) {
                throw new Exception("Invalid Stream used in File. The Stream must be reable.");
            }
        }

        if ($length < 0) {
            if (is_string($file) && $this->isReady()) {
                $length = filesize($file);

                if ($length !== false) {
                    $this->mSize = $length;
                }

            } else if (!is_string($file)) {
                $length = $this->mStream->getLength();
            }
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function getName(): string {
        return $this->mName;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function getStream(): Stream {
        if ($this->mStream == null || $this->mStream->getFlags() == 0) {
            if ($this->mFile != null) {
                $this->mStream = new FileStream($this->mFile, 'r', true);

            } else {
                $this->mStream = new RawStream();
            }
        }

        return $this->mStream;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function isReady(): bool {
        return $this->mError === 0;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function getLength(): int {
        return $this->mSize;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function getError(): int {
        return $this->mError;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function getClientFilename(): string|null {
        return $this->mClientName;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function getClientMediaType(): string|null {
        return $this->mClientType;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function isSaved(): bool {
        return $this->mSaved;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\File")]
    public function save(string|Stream $target): bool {
        if ((!is_string($target) || !is_dir(dirname($target))) && !($target instanceof Stream)) {
            throw new Exception("Target must be a valid file path or an instance of " . Stream::class);

        } else if (!$this->isReady()) {
            throw new Exception("This file contains errors and cannot be moved");

        } else if ($target instanceof Stream && !$target->isWritable()) {
            throw new Exception("Target must be writable");
        }

        $status = false;

        if (is_string($target) && $this->mFile != null) {
            $source = $this->mFile;
            $catcher = new ErrorCatcher();
            $catcher->run(function() use ($target, $source, &$status) {
                if (strpos($target, '://') === false && is_uploaded_file($source)) {
                    $status = move_uploaded_file($source, $target);
                }

                if (!$status) {
                    $status = copy($source, $target);
                }
            });

            if ($status) {
                $this->mFile = $target;

                if ($this->mStream != null) {
                    $this->mStream->close();
                    $this->mStream = null;
                }

            } else if ($catcher->getException() != null) {
                throw $catcher->getException();
            }

        } else {
            $targetStream = $target;
            $stream = $this->getStream();

            if ($stream->isSeekable()) {
                $stream->rewind();
            }

            if (is_string($targetStream)) {
                $targetStream = new FileStream($target, 'w+');
            }

            try {
                while (($bytes = $stream->read(4096)) != null) {
                    $wc = $targetStream->write($bytes);

                    if ($wc < 0 || $wc != strlen($bytes)) {
                        return false;
                    }
                }

            } catch (Throwable $e) {
                if (is_string($target)) {
                    $targetStream->close();
                }

                throw $e;
            }

            $this->mStream->close();
            $this->mStream = $targetStream;
            $this->mFile = is_string($target) ? $target : null;

            $status = true;
        }

        if ($status) {
            $this->mSaved = true;
        }

        return $status;
    }
}
