<?php

namespace App\Services\Weather\NWS;

use App\Services\Weather\AbstractWeatherReporter;
use App\Services\Location;
use App\Services\Weather\Report;
use App\Services\Weather\WeatherInterface;
use App\Services\Weather\WeatherReporterInterface;
use DateTimeInterface;

/**
 * Implementation is incomplete, as this free service requires too many additional computaions,
 * which, in turn, may require additional 3rd party services (possibly, non-free)
 *
 * Included as an example
 */
class WeatherReporter extends AbstractWeatherReporter implements WeatherReporterInterface
{


    private string $userAgent = "{App::NAME}/{App::VERSION}";

    private string $responseFormat = 'application/geo+json';


    public function getReport(Location $location, DateTimeInterface $date): WeatherInterface
    {
        $geoPoint = new GeoPoint($location);

        return new Report();
    }

    private function getApiEndpoint(GeoPoint $point): string
    {
        return $this->apiRoot . '/points/' . $point->getLatitude() . ',' . $point->getLongitude();
    }
}
