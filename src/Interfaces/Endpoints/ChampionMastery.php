<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface ChampionMastery extends Base
{
    public function scores($summonerId) : self;
    public function bySummoner($summonerId) : self;
    public function byChampion($summonerId, $championId) : self;
}

