<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface Champion extends Base
{
    public function champions($championId = null) : self;
}

