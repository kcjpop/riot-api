<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface HttpClient
{
    public function fetch(string $url) : ResponseInterface;
}

