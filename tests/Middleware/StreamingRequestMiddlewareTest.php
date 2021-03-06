<?php

namespace React\Tests\Http\Middleware;

use React\Http\Middleware\StreamingRequestMiddleware;
use React\Http\Io\ServerRequest;
use React\Http\Response;
use React\Tests\Http\TestCase;

class StreamingRequestMiddlewareTest extends TestCase
{
    public function testInvokeMiddlewareReturnsResponseFromFollowingHandler()
    {
        $middleware = new StreamingRequestMiddleware();

        $response = new Response();
        $ret = $middleware(new ServerRequest('GET', 'https://example.com/'), function () use ($response) {
            return $response;
        });

        $this->assertSame($response, $ret);
    }
}
