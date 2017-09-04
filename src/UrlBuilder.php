<?php

declare(strict_types=1);

namespace Outplay\RiotApi;

final class UrlBuilder implements Interfaces\UrlBuilder
{
    protected $paramBag;
    protected $builder;

    public function __construct($regionServer)
    {
        $this->paramBag = new ParamBag();
        $this->paramBag->set('regionServer', $regionServer);

        return $this;
    }

    public function setParam(string $key, $value) : Interfaces\UrlBuilder
    {
        $this->paramBag->set($key, $value);

        return $this;
    }

    public function setBuilder(callable $builder) : Interfaces\UrlBuilder
    {
        $this->builder = $builder;

        return $this;
    }

    public function buildUri()
    {
        return call_user_func($this->builder, $this->paramBag);
    }

    public function build() : string
    {
        return 'https://'
            .$this->paramBag->get('regionServer')
            .'.api.riotgames.com/'
            .$this->buildUri();
    }
}
