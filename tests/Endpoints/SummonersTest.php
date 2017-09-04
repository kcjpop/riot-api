<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\Endpoints\Summoners;
use Outplay\RiotApi\GuzzleHttpClient;
use Outplay\RiotApi\UrlBuilder;
use PHPUnit\Framework\TestCase;

final class SummonersTest extends TestCase
{
    public function testGetSummonerByName()
    {
        $endpoint = new Summoners(new GuzzleHttpClient(), new UrlBuilder());
        $url = $endpoint->getByName('MrFragStealer')->getUrlBuilder()->build();

        $this->assertEquals('lol/summoner/v3/summoners/by-name/MrFragStealer', $url);
    }
}
