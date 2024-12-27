<?php

namespace App\Services\Weather\NWS;

use App\Services\Location;

/**
 * Specifically for NWS weather reporter
 * Converts the @see Location attribute to coordinates on the world map
 */
class GeoPoint
{

    public function __construct(private readonly float $latitude, private readonly float $longitude)
    {}

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
