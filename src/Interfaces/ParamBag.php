<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces;

interface ParamBag
{
    public function __construct(array $store = []);

    public function set(string $key, $value);

    public function get($key);
}

