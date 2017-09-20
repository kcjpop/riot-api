<?php

declare(strict_types=1);

namespace Outplay\RiotApi\Interfaces\Endpoints;

interface StaticData extends Base
{
    public function champions($id = null) : self;
    public function items($id = null) : self;
    public function maps() : self;
    public function masteries($id = null) : self;
    public function languageStrings() : self;
    public function profileIcons() : self;
    public function realms() : self;
    public function runes($id = null) : self;
    public function summonerSpells($id = null) : self;
    public function versions() : self;
}

