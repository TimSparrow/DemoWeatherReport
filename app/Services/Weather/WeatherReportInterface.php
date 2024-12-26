<?php

namespace App\Services\Weather;

use App\Services\Weather\WeatherInterface;
use DateTimeInterface;

interface WeatherReportInterface
{
    public function getReport(DateTimeInterface $date, Location $location): WeatherInterface;

    public function getReportForPeriod(int $days, DateTimeInterface $start = null): array;
}
