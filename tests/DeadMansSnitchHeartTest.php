<?php

namespace Shippinno\Heartbeat;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class DeadMansSnitchHeartTest extends TestCase
{
    public function testBeat()
    {
        $historyContainer = [];
        $stack = HandlerStack::create(new MockHandler([new Response(202)]));
        $stack->push(Middleware::history($historyContainer));
        $client = new Client(['handler' => $stack]);
        $heart = new DeadMansSnitchHeart($client);
        $heart->beat('TOKEN');
        $this->assertCount(1, $historyContainer);
        $request = $historyContainer[0]['request'];
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('https://nosnch.in/TOKEN', $request->getUri()->__toString());
    }
}
