<?php

namespace Shippinno\Heartbeat;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class HeartbeaterTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function testHeartbeatWithoutHeart()
    {
        $heartbeater = Heartbeater::instance();
        $heartbeater->heartbeat('channel');
        $this->assertTrue(true);
    }

    public function testHeartbeatWithHeartAndWithoutChannel()
    {
        $heartbeater = Heartbeater::instance();
        $heart = Mockery::spy(Heart::class);
        $heartbeater->setHeart($heart);
        $heartbeater->heartbeat('channel');
        $heart->shouldNotHaveReceived('beat');
    }

    public function testHeartbeatWithHeartAndChannel()
    {
        $heartbeater = Heartbeater::instance();
        $heart = Mockery::spy(Heart::class);
        $heartbeater->setHeart($heart);
        $heartbeater->setChannels(['CHANNEL' => 'SOME_CHANNEL']);
        $heartbeater->heartbeat('CHANNEL');
        $heart->shouldHaveReceived('beat')->once()->with('SOME_CHANNEL');
    }
}
