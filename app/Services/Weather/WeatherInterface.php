<?php

namespace App\Services\Weather;


interface WeatherInterface
{
    public function hasAlert(string $alert): bool;
}
