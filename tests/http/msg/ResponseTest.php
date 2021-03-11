<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use im\http\msg\Response;
use im\http\msg\HttpResponseBuilder;

final class ResponseTest extends TestCase {

    /**
     *
     */
    public function test_initiate(): Response {
        $response = new HttpResponseBuilder( Response::STATUS_OK );
        $response->getBody()->write("Body");

        $this->assertEquals(
            "HTTP/1.1 200 OK\n\nContent-Type: text/html; charset=utf-8\n\nBody",
            strval($response->getFinal())
        );

        return $response;
    }
}
