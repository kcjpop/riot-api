<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface League extends Base
{
    public function challengerLeagues($queue = '') : self;
    public function masterLeagues($queue = '') : self;
    public function leaguesBySummoner($summonerId) : self;
    public function positionsBySummoner($summonerId) : self;
}

