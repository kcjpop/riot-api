<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\Endpoints\Base;

class Summoners implements Base
{
    const VERSION = 'v3';

    use FetchableTrait;

    public function getByName(string $summonerName) : self
    {
        $this->urlBuilder
            ->setParam('summonerName', $summonerName)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/summoner/$version/summoners/by-name/{$paramBag->get('summonerName')}";
            });

        return $this;
    }
}

