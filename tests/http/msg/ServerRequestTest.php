<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use im\http\msg\Request;
use im\http\msg\ServerRequestBuilder;

$_SERVER += [
    "HTTPS" => "ON",
    "HTTP_HOST" => "domain.com",
    "HTTP_CONTENT_TYPE" => "text/plain",
    "REQUEST_METHOD" => "GET",
    "REQUEST_URI" => "index.php/path/?mykey=some+value",
    "SCRIPT_NAME" => "index.php",
    "SERVER_PORT" => 8080
];

final class ServerRequestTest extends TestCase {

    /**
     *
     */
    public function test_initiate(): Request {
        $request = new ServerRequestBuilder();
        $request->getBody()->write("Body");

        $this->assertEquals(
            "GET /index.php/path?mykey=some+value HTTP/1.1\n\nHost: domain.com\nContent-Type: text/plain\n\nBody",
            strval($request->getFinal())
        );

        return $request;
    }
}
