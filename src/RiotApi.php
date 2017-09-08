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

    const VALID_ENDPOINTS = [
        'champion' => Endpoints\Champion::class,
        'summoner' => Endpoints\Summoner::class,
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
        return self::VALID_REGIONS[$this->config['region']];
    }

    public function getEndpoint(string $name) : Interfaces\Endpoints\Base
    {
        if (!isset($this->endpoints[$name])) {
            if (!isset(self::VALID_ENDPOINTS[$name])) {
                throw new \InvalidArgumentException("Unsupported endpoint: $name. Please check the documentation.");
            }

            $class = self::VALID_ENDPOINTS[$name];
            $this->endpoints[$name] = new $class(new GuzzleHttpClient(), new UrlBuilder($this->getRegionServer()));
        }

        return $this->endpoints[$name];
    }

    public function __get(string $attr) : Interfaces\Endpoints\Base
    {
        return $this->getEndpoint($attr);
    }
}
