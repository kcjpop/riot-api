<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces;

interface UrlBuilder
{
    public function setParam(string $key, $value) : self;
    public function setBuilder(callable $builder) : self;
    public function build(array $queryStringParams = []) : string;
}

