<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\HttpClient;
use Outplay\RiotApi\Interfaces\UrlBuilder;
use Psr\Http\Message\ResponseInterface;

trait FetchableTrait
{
    public function __construct(HttpClient $httpClient, UrlBuilder $builder)
    {

    }

    public function fetch(array $queryStringParams = []) : ResponseInterface
    {

    }
}

