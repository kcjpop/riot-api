<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface Spectator extends Base
{
    public function featuredGames() : self;
    public function activeGames($summonerId) : self;
}

