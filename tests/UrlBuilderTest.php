<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\UrlBuilder;
use PHPUnit\Framework\TestCase;

final class UrlBuilderTest extends TestCase
{
    protected $builder;

    public function setUp()
    {
        $this->builder = new UrlBuilder();
    }

    public function testBuild()
    {
        $url = $this->builder
            ->setParam('foo', 1)
            ->setParam('bar', 'hello')
            ->setBuilder(function ($paramBag) {
                return "lol/resources/{$paramBag->get('foo')}/blah/{$paramBag->get('bar')}";
            })
            ->build();

        $this->assertEquals($url, 'lol/resources/1/blah/hello');

        $url = $this->builder
            ->setBuilder(function ($paramBag) {
                return "foo/bar/blah/{$paramBag->get('foo')}";
            })
            ->build();
        $this->assertEquals($url, 'foo/bar/blah/1');
    }
}
