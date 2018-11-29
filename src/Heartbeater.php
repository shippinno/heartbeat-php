<?php
declare(strict_types=1);

namespace Shippinno\Heartbeat;

use Exception;

class Heartbeater
{
    /**
     * @var Heart
     */
    protected $heart;

    /**
     * @var array
     */
    protected $channels;

    /**
     * @var Heartbeater
     */
    private static $instance;

    /**
     * @return Heartbeater
     */
    public static function instance(): Heartbeater
    {
        if (is_null(self::$instance)) {
            self::$instance = new Heartbeater;
        }

        return self::$instance;
    }

    /**
     * @param Heart $heart
     */
    public function setHeart(Heart $heart): void
    {
        $this->heart = $heart;
    }

    /**
     * @param array $channels
     */
    public function setChannels(array $channels): void
    {
        $this->channels = $channels;
    }

    /**
     * @param string $channelName
     */
    public function heartbeat(string $channelName): void
    {
        if (is_null($this->heart)) {
            return;
        }
        if (!isset($this->channels[$channelName])) {
            return;
        }
        try {
            $this->heart->beat($this->channels[$channelName]);
        } catch (Exception $e) {
            // Ignore exceptions.
        }
    }
}
