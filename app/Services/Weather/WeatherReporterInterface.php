<?php

namespace App\Services\Weather;

use App\Services\Location;
use App\Services\Weather\WeatherInterface;
use DateTimeInterface;

interface WeatherReporterInterface
{
    public function getReport(Location $location, DateTimeInterface $date): WeatherInterface;

    public function getReportForPeriod(Location $location, int $days, DateTimeInterface $start = null): array;
}
