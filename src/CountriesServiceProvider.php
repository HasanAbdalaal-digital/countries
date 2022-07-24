<?php

namespace Hasan\Countries;

use Illuminate\Support\ServiceProvider;
use Bhuvidya\Countries\MakeSeederCommand;

class CountriesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // config file
        if ($this->app->runningInConsole()) {
            $sourceCountries = realpath(__DIR__ . '/../config/countries.php');
            $sourceCities = realpath(__DIR__ . '/../config/cities.php');
            $sourceRegions = realpath(__DIR__ . '/../config/regions.php');
            $this->publishes([ $sourceCountries => config_path('countries.php') ], 'config');
            $this->publishes([ $sourceCities => config_path('cities.php') ], 'config');
            $this->publishes([ $sourceRegions => config_path('regions.php') ], 'config');
        }

        // migrations
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../migrations'));
    }

    /**
     * Register everything.
     *
     * @return void
     */
    public function register()
    {
        $sourceCountries = realpath(__DIR__ . '/../config/countries.php');
        $sourceRegions = realpath(__DIR__ . '/../config/regions.php');

        $sourceCities = realpath(__DIR__ . '/../config/cities.php');
        $this->mergeConfigFrom($sourceCountries, 'countries');
        $this->mergeConfigFrom($sourceRegions, 'regions');
        $this->mergeConfigFrom($sourceCities, 'cities');
//
//        $this->publishes([ $sourceCountries => config_path('countries.php') ], 'config');
//        $this->publishes([ $sourceCities => config_path('cities.php') ], 'config');
//        $this->publishes([ $sourceRegions => config_path('regions.php') ], 'config');
    }
}
