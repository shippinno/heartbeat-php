<?php
declare(strict_types=1);

namespace Shippinno\Heartbeat;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class DeadMansSnitchHeart implements Heart
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?: new Client;
    }

    /**
     * @param string $token
     */
    public function beat($token): void
    {
        $this->client->get(sprintf('https://nosnch.in/%s', $token));
    }
}
