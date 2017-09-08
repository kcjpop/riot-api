<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\Endpoints\Champion;
use Outplay\RiotApi\GuzzleHttpClient;
use Outplay\RiotApi\UrlBuilder;
use PHPUnit\Framework\TestCase;

final class ChampionTest extends TestCase
{
    public function setUp()
    {
        $this->endpoint = new Champion(new GuzzleHttpClient(), new UrlBuilder('eune1'));
    }

    public function testGetChampions()
    {
        $url = $this->endpoint->champions()->getUrlBuilder()->build();

        $this->assertEquals('https://eune1.api.riotgames.com/lol/platform/v3/champions', $url);
    }

    public function testGetAChampion()
    {
        $championId = 123;
        $url = $this->endpoint->champions($championId)->getUrlBuilder()->build();

        $this->assertEquals("https://eune1.api.riotgames.com/lol/platform/v3/champions/$championId", $url);
    }
}
