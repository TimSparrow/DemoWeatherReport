<?php

namespace App\Services\Weather;

use App\Services\Location;
use App\Services\Weather\WeatherReporterInterface;
use DateInterval;
use DateTimeInterface;

abstract class AbstractWeatherReporter implements WeatherReporterInterface
{
    public function getReportForPeriod(Location $location, int $days, DateTimeInterface $start = null): array
    {
        $reports = [];
        $start ??= new \DateTimeImmutable();
        for($i = 0; $i < $days; $i++) {
            $date = $start->add(new \DateInterval('P' . $i . 'D'));
            $reports[] = $this->getReport($location, $date);
        }
        return $reports;
    }
}
