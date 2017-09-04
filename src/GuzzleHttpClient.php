<?php

declare(strict_types=1);

namespace Outplay\RiotApi;

use Psr\Http\Message\ResponseInterface;

final class GuzzleHttpClient implements Interfaces\HttpClient
{
    public function fetch(string $url) : ResponseInterface
    {
    }
}
