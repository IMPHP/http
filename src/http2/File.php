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

use Exception;
use im\ErrorCatcher;
use im\http2\msg\File as IFile;
use im\io\Stream;
use im\io\FileStream;
use im\io\RawStream;

/**
 * An implementation of `im\http2\msg\File`
 */
class File implements IFile {

    /**
     * @internal
     */
    protected string $name;

    /**
     * @internal
     */
    protected int $error;

    /**
     * @internal
     */
    protected int $size;

    /**
     * @internal
     */
    protected ?string $clientName;

    /**
     * @internal
     */
    protected ?string $clientType;

    /**
     * @internal
     */
    protected ?string $file;

    /**
     * @internal
     */
    protected ?Stream $stream;

    /**
     * @internal
     */
    protected bool $saved = false;

    /**
     * 
     */
    public function __construct(string $name, string|Stream $file, int $length=-1, int $error=0, string|null $clientName=null, string|null $clientType=null) {
        if (is_string($file)) {
            $this->file = $file;

        } else {
            $this->stream = $file;

            if (!$this->stream->isReadable()) {
                throw new Exception("Invalid Stream used in File. The Stream must be reable.");
            }
        }

        if ($length < 0) {
            if (is_string($file) && $this->isReady()) {
                $length = filesize($file);

                if ($length === false) {
                    $length = -1;
                }

            } else if (!is_string($file)) {
                $length = $this->stream->getLength();
            }
        }

        $this->name = $name;
        $this->error = $error;
        $this->size = $length;
        $this->clientName = $clientName;
        $this->clientType = $clientType;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function getName(): string {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function getStream(): Stream {
        if ($this->stream == null || $this->stream->getFlags() == 0) {
            if ($this->file != null) {
                $this->stream = new FileStream($this->file, 'r', true);

            } else {
                $this->stream = new RawStream();
            }
        }

        return $this->stream;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function isReady(): bool {
        return $this->error === 0;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function getLength(): int {
        return $this->size;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function getError(): int {
        return $this->error;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function getClientFilename(): string|null {
        return $this->clientName;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function getClientMediaType(): string|null {
        return $this->clientType;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function isSaved(): bool {
        return $this->saved;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\File")]
    public function save(string|Stream $target): bool {
        if ((!is_string($target) || !is_dir(dirname($target))) && !($target instanceof Stream)) {
            throw new Exception("Target must be a valid file path or an instance of " . Stream::class);

        } else if (!$this->isReady()) {
            throw new Exception("This file contains errors and cannot be moved");

        } else if ($target instanceof Stream && !$target->isWritable()) {
            throw new Exception("Target must be writable");
        }

        $status = false;

        if (is_string($target) && $this->file != null) {
            $source = $this->file;
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
                $this->file = $target;

                if ($this->stream != null) {
                    $this->stream->close();
                    $this->stream = null;
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

            $status = $targetStream->writeFromStream($stream) != -1;

            $this->stream->close();
            $this->stream = $targetStream;
            $this->file = is_string($target) ? $target : null;
        }

        if ($status) {
            $this->mSaved = true;
        }

        return $status;
    }
}
