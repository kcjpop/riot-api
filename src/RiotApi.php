<?php
declare(strict_types=1);

namespace Outplay\RiotApi;

final class RiotApi implements Interfaces\RiotApi
{
    protected $endpoints = [];
    protected $config = [];

    public function __construct(array $config)
    {
        $this->config = array_merge($this->config, $config);
    }

    public function getEndpoint(string $name) : Interfaces\Endpoints\Base
    {
        $endpointMapping = [
            'summoners' => Endpoints\Summoners::class,
        ];

        if (!isset($this->endpoints[$name])) {
            if (!isset($endpointMapping[$name])) {
                throw new \InvalidArgumentException("Unsupported endpoint: $name. Please check the documentation.");
            }

            $class = $endpointMapping[$name];
            $this->endpoints[$name] = new $class(new GuzzleHttpClient(), new UrlBuilder());
        }

        return $this->endpoints[$name];
    }

    public function __get(string $attr) : Interfaces\Endpoints\Base
    {
        return $this->getEndpoint($attr);
    }
}
