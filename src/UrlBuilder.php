<?php

declare(strict_types=1);

namespace Outplay\RiotApi;

final class UrlBuilder implements Interfaces\UrlBuilder
{
    protected $paramBag;
    protected $builder;

    public function __construct(ParamBag $paramBag = null)
    {
        $this->paramBag = $paramBag ?? new ParamBag();

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

    public function build() : string
    {
        return call_user_func($this->builder, $this->paramBag);
    }
}
