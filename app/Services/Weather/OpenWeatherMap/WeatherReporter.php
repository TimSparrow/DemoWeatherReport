<?php

namespace App\Services\Weather\OpenWeatherMap;

use App\Services\Weather\AbstractWeatherReporter;
use App\Services\Location;
use App\Services\Weather\WeatherInterface;
use App\Services\Weather\WeatherReporterInterface;
use DateTimeInterface;
use App\Services\Weather\Report;

class WeatherReporter extends AbstractWeatherReporter implements WeatherReporterInterface
{

    public function getReport(Location $location, DateTimeInterface $date): WeatherInterface
    {
        // TODO: Implement getReport() method.
        return new Report();
    }
}
