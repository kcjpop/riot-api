<?php
declare(strict_types=1);

namespace Outplay\RiotApi;

final class RiotApi implements Interfaces\RiotApi
{
    protected $endpoints = [];
    protected $config = [];

    const VALID_REGIONS = [
        'br' => 'br1',
        'eune' => 'eun1',
        'euw' => 'euw1',
        'jp' => 'jp1',
        'kr' => 'kr',
        'lan' => 'la1',
        'las' => 'la2',
        'na' => 'na1',
        'oce' => 'oc1',
        'ru' => 'ru',
        'tr' => 'tr1',
    ];

    public function __construct(array $config)
    {
        $this->config = array_merge($this->config, $config);
        $this->ofRegion($config['region'] ?? '');
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function ofRegion(string $region) : Interfaces\RiotApi
    {
        $region = strtolower($region);

        if (empty($region)) throw new \InvalidArgumentException('A region must be provided');

        if (!isset(self::VALID_REGIONS[$region])) throw new \InvalidArgumentException("Invalid region provided: $region");

        $this->config['region'] = $region;

        return $this;
    }

    public function getRegionServer()
    {
        return VALID_REGIONS[$this->config['region']];
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
