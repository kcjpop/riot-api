<?php
declare(strict_types=1);

namespace Tests;

use Outplay\RiotApi\ParamBag;
use PHPUnit\Framework\TestCase;

final class ParamBagTest extends TestCase
{
    protected $bag;

    public function setUp()
    {
        $this->bag = new ParamBag([
            'foo' => 1,
            'bar' => 'blah',
        ]);
    }

    public function testInitDataWhenCreatingANewBag()
    {
        $this->assertEquals($this->bag->get('foo'), 1);
        $this->assertEquals($this->bag->get('bar'), 'blah');
    }

    public function testSet()
    {
        $this->bag->set('hello', 'world');
        $this->assertEquals($this->bag->get('hello'), 'world');
    }

    public function testGetUndefinedKey()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->bag->get('terve');
    }
}
