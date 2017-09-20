<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface Match extends Base
{
    public function matches($id) : self;
    public function matchList($accountId) : self;
    public function matchListRecent($accountId) : self;
    public function timelines($matchId) : self;
    public function matcheIdsByTournamentCode($tournamentCode) : self;
    public function matchesByTournamentCode($matchId, $tournamentCode) : self;
}

