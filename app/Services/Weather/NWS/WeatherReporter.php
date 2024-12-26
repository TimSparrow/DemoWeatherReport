<?php

namespace App\Services\Weather\NWS;

use App\Services\Weather\AbstractWeatherReporter;
use App\Services\Location;
use App\Services\Weather\Report;
use App\Services\Weather\WeatherInterface;
use App\Services\Weather\WeatherReporterInterface;
use DateTimeInterface;

class WeatherReporter extends AbstractWeatherReporter implements WeatherReporterInterface
{

    public function getReport(Location $location, DateTimeInterface $date): WeatherInterface
    {
        // TODO: Implement getReport() method.
        return new Report();
    }
}
