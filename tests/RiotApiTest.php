<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\RiotApi;
use Outplay\RiotApi\Interfaces\Endpoints\Base as EndpointInterface;
use PHPUnit\Framework\TestCase;

final class RiotApiTest extends TestCase
{
    public function testCreateEndpoint()
    {
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'EUNE']);

        $this->assertInstanceOf(EndpointInterface::class, $api->getEndpoint('summoners'));
    }

    public function testCreateEndpointAsClassProperty()
    {
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'EUNE']);

        $this->assertInstanceOf(EndpointInterface::class, $api->summoners);
        $this->assertEquals($api->summoners, $api->getEndpoint('summoners'));
    }

    public function testCreateUnsupportedEndpoint()
    {
        $this->expectException(\InvalidArgumentException::class);
        $api = new RiotApi(['apiKey' => 'bar', 'region' => 'eune']);
        $api->fooEndpoint;
    }

    public function testSetRegion()
    {
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'EUNE']);

        $this->assertEquals($api->getConfig()['region'], 'eune');

        $api->ofRegion('euW');
        $this->assertEquals($api->getConfig()['region'], 'euw');
    }

    public function testMissingRegion()
    {
        $this->expectException(\InvalidArgumentException::class);
        $api = new RiotApi(['apiKey' => 'foo']);
    }

    public function testInvalidRegion()
    {
        $this->expectException(\InvalidArgumentException::class);
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'fin']);
    }
}
