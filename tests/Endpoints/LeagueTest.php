<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\Endpoints\League;
use Outplay\RiotApi\GuzzleHttpClient;
use Outplay\RiotApi\UrlBuilder;
use PHPUnit\Framework\TestCase;

final class LeagueTest extends TestCase
{
    const QUEUES = [
        'RANKED_SOLO_5x5',
        'RANKED_FLEX_SR',
        'RANKED_FLEX_TT',
    ];

    public function setUp()
    {
        $this->endpoint = new League(new GuzzleHttpClient(), new UrlBuilder('eune1'));
    }

    public function testGetChallengerLeagues()
    {
        foreach (self::QUEUES as $queue) {
            $url = $this->endpoint->challengerLeagues($queue)->getUrlBuilder()->build();
            $this->assertEquals('https://eune1.api.riotgames.com/lol/league/v3/challengerleagues/by-queue/'.$queue, $url);
        }

        $url = $this->endpoint->challengerLeagues()->getUrlBuilder()->build();
        $this->assertEquals('https://eune1.api.riotgames.com/lol/league/v3/challengerleagues/by-queue/', $url);
    }

    public function testGetMasterLeagues()
    {
        foreach (self::QUEUES as $queue) {
            $url = $this->endpoint->masterLeagues($queue)->getUrlBuilder()->build();
            $this->assertEquals('https://eune1.api.riotgames.com/lol/league/v3/masterleagues/by-queue/'.$queue, $url);
        }

        $url = $this->endpoint->masterLeagues()->getUrlBuilder()->build();
        $this->assertEquals('https://eune1.api.riotgames.com/lol/league/v3/masterleagues/by-queue/', $url);
    }

    public function testGetLeaguesBySummoner()
    {
        $summonerId = 123456789;
        $url = $this->endpoint->leaguesBySummoner($summonerId)->getUrlBuilder()->build();
        $this->assertEquals('https://eune1.api.riotgames.com/lol/league/v3/leagues/by-summoner/'.$summonerId, $url);
    }

    public function testGetPositionBySummoner()
    {
        $summonerId = 123456789;
        $url = $this->endpoint->positionsBySummoner($summonerId)->getUrlBuilder()->build();
        $this->assertEquals('https://eune1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$summonerId, $url);
    }
}
