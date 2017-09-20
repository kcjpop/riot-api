<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\Endpoints\ChampionMastery;
use Outplay\RiotApi\GuzzleHttpClient;
use Outplay\RiotApi\UrlBuilder;
use PHPUnit\Framework\TestCase;

final class ChampionMasteryTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new ChampionMastery(new GuzzleHttpClient(), new UrlBuilder('eune1'));
    }

    public function testGetScores()
    {
        $summonerId = 123456789;
        $url = $this->endpoint->scores($summonerId)->getUrlBuilder()->build();

        $this->assertEquals(
            'https://eune1.api.riotgames.com/lol/champion-mastery/v3/scores/by-summoner/'.$summonerId,
            $url
        );
    }

    public function testGetBySummoner()
    {
        $summonerId = 123456789;
        $url = $this->endpoint->bySummoner($summonerId)->getUrlBuilder()->build();

        $this->assertEquals(
            'https://eune1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$summonerId,
            $url
        );
    }

    public function testGetByChampion()
    {
        $summonerId = 123456789;
        $championId = 987;
        $url = $this->endpoint->byChampion($summonerId, $championId)->getUrlBuilder()->build();

        $this->assertEquals(
            'https://eune1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$summonerId.'/by-champion/'.$championId,
            $url
        );
    }
}
