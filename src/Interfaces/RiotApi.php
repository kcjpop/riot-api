<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces;

interface RiotApi
{
    public function __construct(array $config);

    public function getEndpoint(string $name) : Endpoints\Base;
}

