<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\Endpoints\League as LeagueInterface;

class League implements LeagueInterface
{
    const VERSION = 'v3';

    use FetchableTrait;

    public function challengerLeagues($queue = '') : LeagueInterface
    {
        $this->urlBuilder
            ->setParam('queue', $queue)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/league/$version/challengerleagues/by-queue/{$paramBag->get('queue')}";
            });

        return $this;
    }

    public function masterLeagues($queue = '') : LeagueInterface
    {
        $this->urlBuilder
            ->setParam('queue', $queue)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/league/$version/masterleagues/by-queue/{$paramBag->get('queue')}";
            });

        return $this;
    }

    public function leaguesBySummoner($summonerId) : LeagueInterface
    {
        $this->urlBuilder
            ->setParam('summonerId', $summonerId)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/league/$version/leagues/by-summoner/{$paramBag->get('summonerId')}";
            });

        return $this;
    }

    public function positionsBySummoner($summonerId) : LeagueInterface
    {
        $this->urlBuilder
            ->setParam('summonerId', $summonerId)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/league/$version/positions/by-summoner/{$paramBag->get('summonerId')}";
            });

        return $this;
    }
}

