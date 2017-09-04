<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface Summoner extends Base
{
    public function getByName(string $summonerName) : self;
}

