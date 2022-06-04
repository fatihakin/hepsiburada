<?php

namespace App\Providers;

use App\Repositories\Plateau\PlateauRepository;
use App\Repositories\Plateau\PlateauRepositoryInterface;
use App\Repositories\PlateauRover\PlateauRoverRepository;
use App\Repositories\PlateauRover\PlateauRoverRepositoryInterface;
use App\Repositories\Rover\RoverRepository;
use App\Repositories\Rover\RoverRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PlateauRepositoryInterface::class, PlateauRepository::class);
        $this->app->bind(RoverRepositoryInterface::class, RoverRepository::class);
        $this->app->bind(PlateauRoverRepositoryInterface::class, PlateauRoverRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
