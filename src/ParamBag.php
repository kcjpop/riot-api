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

    public function set(string $key, $value)
    {
        $this->store[$key] = $value;
    }

    public function get($key)
    {
        if (!array_key_exists($key, $this->store)) {
            throw new \InvalidArgumentException("Cannot find key in parameter bag: $key.");
        }

        return $this->store[$key];
    }
}

