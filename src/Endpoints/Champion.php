<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\Endpoints\Champion as ChampionInterface;

class Champion implements ChampionInterface
{
    const VERSION = 'v3';

    use FetchableTrait;

    public function champions($championId = null) : ChampionInterface
    {
        $this->urlBuilder
            ->setParam('championId', $championId)
            ->setBuilder(function ($paramBag) {
                $version = self::VERSION;
                $championId = $paramBag->get('championId');
                return "lol/platform/$version/champions".(!empty($championId) ? "/$championId" : '');
            });

        return $this;
    }
}

