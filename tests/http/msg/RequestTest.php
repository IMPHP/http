<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use im\http\msg\Request;
use im\http\msg\HttpRequestBuilder;
use im\http\msg\HttpUriBuilder;
use im\http\msg\HttpFile;
use im\io\RawStream;

final class RequestTest extends TestCase {

    /**
     *
     */
    public function test_initiate(): Request {
        $request = new HttpRequestBuilder("GET", new HttpUriBuilder("http://domain.com/path"));
        $request->getBody()->write("Body");

        $this->assertEquals(
            "GET /path HTTP/1.1\n\nHost: domain.com\n\nBody",
            strval($request->getFinal())
        );

        return $request;
    }

    /**
     * @depends test_initiate
     */
    public function test_file(Request $request): void {
        $target = new RawStream();
        $source = new RawStream();
        $source->write("content");

        $request->addFile(new HttpFile(
            "TestFile",
            $source
        ));

        $this->assertEquals(
            true,
            $request->getFile("TestFile")->save($target)
        );

        $target->rewind();

        $this->assertEquals(
            "content",
            strval($target)
        );
    }
}
