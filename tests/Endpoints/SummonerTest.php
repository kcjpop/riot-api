<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\Endpoints\Summoner;
use Outplay\RiotApi\GuzzleHttpClient;
use Outplay\RiotApi\UrlBuilder;
use PHPUnit\Framework\TestCase;

final class SummonerTest extends TestCase
{
    public function testGetSummonerByName()
    {
        $endpoint = new Summoner(new GuzzleHttpClient(), new UrlBuilder('euw1'));
        $url = $endpoint->getByName('MrFragStealer')->getUrlBuilder()->build();

        $this->assertEquals('https://euw1.api.riotgames.com/lol/summoner/v3/summoners/by-name/MrFragStealer', $url);
    }
}
