<?php

namespace App\Services\Weather;

class WeatherAlert implements WeatherAlertInterface
{
    public const UV = 'uv';
    public const RAIN = 'rain';

    public static function getAlerts(): array
    {
        return [
            self::UV, self::RAIN
        ];
    }


}
