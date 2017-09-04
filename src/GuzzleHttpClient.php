<?php

declare(strict_types=1);

namespace Outplay\RiotApi;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

final class GuzzleHttpClient implements Interfaces\HttpClient
{
    protected $client;

    public function __construct()
    {
        $this->setClient(new Client());
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function fetch(string $url) : ResponseInterface
    {
        return $this->client->get($url);
    }
}
