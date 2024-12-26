<?php

namespace App\Services\Weather;

use App\Services\Weather\WeatherReportInterface;
use DateInterval;
use DateTimeInterface;

abstract class AbstractWeatherReport implements WeatherReportInterface
{
    public function getReportForPeriod(int $days, DateTimeInterface $start = null): array
    {
        $reports = [];
        $start ??= new \DateTimeImmutable();
        for($i = 0; $i < $days; $i++) {
            $date = $start->add(new \DateInterval('P' . $i . 'D'));
            $reports[] = $this->getReport($date, $location);
        }
        return $reports;
    }
}
