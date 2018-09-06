<?php

namespace Shippinno\Heartbeat;

use Mockery;
use PHPUnit\Framework\TestCase;

class HeartbeatableTest extends TestCase
{
    public function testHeartbeatWithoutHeart()
    {
        $heartbeatable = new TestHeartbeatable;
        $heartbeatable->heartbeat();
        $this->assertTrue(true);
    }

    public function testHeartbeatWithHeart()
    {
        $heart = Mockery::spy(Heart::class);
        $heartbeatable = new TestHeartbeatable;
        $heartbeatable->setHeart($heart);
        $heartbeatable->heartbeat();
        $heart->shouldHaveReceived('beat')->once();
        $this->assertTrue(true);
    }
}

class TestHeartbeatable
{
    use Heartbeatable;
}