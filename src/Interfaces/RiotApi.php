<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces;

interface RiotApi
{
    public function __construct(array $config);

    public function ofRegion(string $region) : self;

    public function getEndpoint(string $name) : Endpoints\Base;
}

