<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface Status extends Base
{
    public function shardData() : self;
}
