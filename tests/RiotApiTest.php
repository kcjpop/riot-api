<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\RiotApi;
use Outplay\RiotApi\Interfaces\Endpoints\Base as EndpointInterface;
use PHPUnit\Framework\TestCase;

final class RiotApiTest extends TestCase
{
    public function testCreateEndpoint() : void
    {
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'EUNE']);

        $this->assertInstanceOf(EndpointInterface::class, $api->getEndpoint('summoners'));
    }

    public function testCreateEndpointAsClassProperty() : void
    {
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'EUNE']);

        $this->assertInstanceOf(EndpointInterface::class, $api->summoners);
        $this->assertEquals($api->summoners, $api->getEndpoint('summoners'));
    }

    public function testCreateUnsupportedEndpoint() : void
    {
        $this->expectException(\InvalidArgumentException::class);
        $api = new RiotApi(['apiKey' => 'bar']);
        $api->fooEndpoint;
    }

    public function testSetRegion() : void
    {
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'EUNE']);

        $this->assertEquals($api->getConfig()['region'], 'eune');

        $api->ofRegion('euW');
        $this->assertEquals($api->getConfig()['region'], 'euw');
    }

    public function testMissingRegion() : void
    {
        $this->expectException(\InvalidArgumentException::class);
        $api = new RiotApi(['apiKey' => 'foo']);
    }

    public function testInvalidRegion() : void
    {
        $this->expectException(\InvalidArgumentException::class);
        $api = new RiotApi(['apiKey' => 'foo', 'region' => 'fin']);
    }
}
