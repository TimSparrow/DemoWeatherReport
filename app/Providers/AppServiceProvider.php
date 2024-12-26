<?php

namespace App\Providers;

use App\Services\Weather\WeatherReporterInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\Weather\NWS\WeatherReporter as NWSWeatherReporter;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        WeatherReporterInterface::class => NWSWeatherReporter::class,
    ];
}
