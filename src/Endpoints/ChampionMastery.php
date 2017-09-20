<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\Endpoints\ChampionMastery as ChampionMasteryInterface;

class ChampionMastery implements ChampionMasteryInterface
{
    const VERSION = 'v3';

    use FetchableTrait;

    public function scores($summonerId) : ChampionMasteryInterface
    {
        $this->urlBuilder
            ->setParam('summonerId', $summonerId)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/champion-mastery/$version/scores/by-summoner/{$paramBag->get('summonerId')}";
            });

        return $this;
    }

    public function bySummoner($summonerId) : ChampionMasteryInterface
    {
        $this->urlBuilder
            ->setParam('summonerId', $summonerId)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/champion-mastery/$version/champion-masteries/by-summoner/{$paramBag->get('summonerId')}";
            });

        return $this;
    }

    public function byChampion($summonerId, $championId) : ChampionMasteryInterface
    {
        $this->urlBuilder
            ->setParam('championId', $championId)
            ->setParam('summonerId', $summonerId)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                return "lol/champion-mastery/$version/champion-masteries/by-summoner/{$paramBag->get('summonerId')}/by-champion/{$paramBag->get('championId')}";
            });

        return $this;
    }
}

