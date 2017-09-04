<?php
declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client;
use Mockery as m;
use Outplay\RiotApi\GuzzleHttpClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class GuzzleHttpClientTest extends TestCase
{
    public function testFetch()
    {
        $response = m::mock(ResponseInterface::class);
        $url = 'localhost';
        $mock = m::mock(Client::class)
            ->shouldReceive('get', [$url])
            ->andReturn($response)
            ->getMock();

        $client = new GuzzleHttpClient();
        $client->setClient($mock);

        $result = $client->fetch($url);
        $this->assertEquals($result, $response);
    }
}
