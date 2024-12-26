<?php

namespace App\Services\Weather;

use App\Services\Weather\WeatherInterface;

class Report implements WeatherInterface
{

    public function hasAlert(string $alert): bool
    {
        // TODO: Implement hasAlert() method.
        return false;
    }
}
