<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Endpoints;

use Outplay\RiotApi\Interfaces\Endpoints\Base;

class Summoners implements Base
{
    use FetchableTrait;

    public function getByName(string $summonerName) : self
    {
        return $this;
    }
}

