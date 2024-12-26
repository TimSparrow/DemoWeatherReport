<?php

namespace App\Services\Weather;

interface LocationInterface
{
    public function getCity(): string;

    public function getState(): string;

    public function getRegion(): string;
    public function getCountry(): string;
}
