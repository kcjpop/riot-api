<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\Endpoints\Summoner as SummonerInterface;

class Summoner implements SummonerInterface
{
    const VERSION = 'v3';

    use FetchableTrait;

    public function getByName(string $summonerName) : SummonerInterface
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

