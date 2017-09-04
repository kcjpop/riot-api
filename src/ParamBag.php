<?php

declare(strict_types=1);

namespace Outplay\RiotApi;

final class ParamBag implements Interfaces\ParamBag
{
    protected $store = [];

    public function __construct(array $store = [])
    {
        $this->store = $store;

        return $this;
    }

    public function set(string $key, $value) : void
    {
        $this->store[$key] = $value;
    }

    public function get($key)
    {
        if (!isset($this->store[$key])) {
            throw new \InvalidArgumentException("Cannot find key in parameter bag: $key.");
        }

        return $this->store[$key];
    }
}

