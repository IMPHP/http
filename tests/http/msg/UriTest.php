<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use im\http\msg\Uri;
use im\http\msg\HttpUriBuilder;

final class UriTest extends TestCase {

    /**
     *
     */
    public function test_initiate(): Uri {
        $uri = new HttpUriBuilder("https://user:passwd@mydomain.com:8080/my/path/to/default.php?action=exec&var=val#myfrag");

        $this->assertEquals(
            "https://user:passwd@mydomain.com:8080/my/path/to/default.php?action=exec&var=val#myfrag",
            strval($uri->getFinal())
        );

        return $uri;
    }
}
