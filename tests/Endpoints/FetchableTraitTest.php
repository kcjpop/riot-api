<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\Endpoints\FetchableTrait;

use Mockery as m;
use Outplay\RiotApi\Interfaces\Endpoints\Base as EndpointInterface;
use Outplay\RiotApi\Interfaces\HttpClient;
use Outplay\RiotApi\UrlBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class Dummy implements EndpointInterface
{
    use FetchableTrait;

    public function foo()
    {
        $this->urlBuilder
            ->setBuilder(function ($paramBag) {
                return 'dummy/resources';
            });

        return $this;
    }
}

final class FetchableTraitTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testFetch()
    {
        $response = m::mock(ResponseInterface::class);
        $httpClient = m::mock(HttpClient::class)
            ->shouldReceive('fetch')
            ->andReturn($response)
            ->getMock();

        $dummy = new Dummy($httpClient, new UrlBuilder('eune'));
        $result = $dummy->foo()->fetch();

        $this->assertEquals($result, $response);
    }
}
