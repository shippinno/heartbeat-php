<?php

namespace Shippinno\Heartbeat;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class DeadMansSnitchHeart implements Heart
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var Client
     */
    private $client;

    /**
     * @param string $token
     * @param ClientInterface|null $client
     */
    public function __construct(string $token, ClientInterface $client = null)
    {
        $this->token = $token;
        $this->client = $client ?: new Client;
    }

    /**
     * {@inheritdoc}
     */
    public function beat(): void
    {
        $this->client->get(sprintf('https://nosnch.in/%s', $this->token));
    }
}
