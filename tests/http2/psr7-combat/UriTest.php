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
namespace im\test\http2\combat\psr7;

use PHPUnit\Framework\TestCase;
use im\http2\combat\psr7\Uri as PsrUri;
use im\http2\Uri;

/**
 *
 */
class UriTest extends TestCase {

    /**
     *
     */
    public function init(): PsrUri {
        return new PsrUri(new Uri("https://user:passwd@mydomain.com:8080/my/path/to/default.php?action=exec&var=val#myfrag"));
    }

    /**
     *
     */
    public function test_basic(): void {
        $uri = $this->init();

        $this->assertEquals(
            "https://user:passwd@mydomain.com:8080/my/path/to/default.php?action=exec&var=val#myfrag",
            (string) $uri
        );
    }

    /**
     * 
     */
    public function test_fragment(): void {
        $uri = $this->init();

        $this->assertEquals(
            "myfrag",
            $uri->getFragment()
        );

        $uri = $uri->withFragment("otherFrag");

        $this->assertEquals(
            "otherFrag",
            $uri->getFragment()
        );
    }

    /**
     * 
     */
    public function test_querystring(): void {
        $uri = $this->init();

        $this->assertEquals(
            "action=exec&var=val",
            $uri->getQuery()
        );

        $uri = $uri->withQuery("action=exec&var=val2");

        $this->assertEquals(
            "action=exec&var=val2",
            $uri->getQuery()
        );
    }

    /**
     * 
     */
    public function test_path(): void {
        $uri = $this->init();

        $this->assertEquals(
            "/my/path/to/default.php",
            $uri->getPath()
        );

        $uri = $uri->withPath("../relative path/file.php/");

        $this->assertEquals(
            "../relative%20path/file.php/",
            $uri->getPath()
        );

        $this->assertEquals(
            "https://user:passwd@mydomain.com:8080/../relative%20path/file.php/?action=exec&var=val#myfrag",
            (string) $uri
        );
    }

    /**
     * 
     */
    public function test_authority(): void {
        $uri = $this->init();

        $this->assertEquals(
            "user:passwd@mydomain.com:8080",
            $uri->getAuthority()
        );

        $uri = $uri->withUserInfo(null);
        $uri = $uri->withHost("otherdomain.com");
        $uri = $uri->withPort(443);

        $this->assertEquals(
            "otherdomain.com",
            $uri->getAuthority()
        );

        $uri = $uri->withScheme("http");

        $this->assertEquals(
            "otherdomain.com:443",
            $uri->getAuthority()
        );

        $uri = $uri->withUserInfo("name", "psw");

        $this->assertEquals(
            "name:psw@otherdomain.com:443",
            $uri->getAuthority()
        );
    }
}