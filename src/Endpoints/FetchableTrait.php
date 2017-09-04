<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\HttpClient;
use Outplay\RiotApi\Interfaces\UrlBuilder;
use Psr\Http\Message\ResponseInterface;

trait FetchableTrait
{
    protected $httpClient;
    protected $urlBuilder;

    public function __construct(HttpClient $httpClient, UrlBuilder $builder)
    {
        $this->urlBuilder = $builder;
        $this->httpClient = $httpClient;
    }

    public function fetch(array $queryStringParams = []) : ResponseInterface
    {
        $url = $this->urlBuilder->build($queryStringParams);

        return $this->httpClient->fetch($url);
    }

    public function getUrlBuilder()
    {
        return $this->urlBuilder;
    }
}

