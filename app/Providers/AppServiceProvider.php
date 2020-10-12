<?php

namespace App\Providers;

use App\Repositories\ORM\CsvRepository;
use App\Strategy\CsvDataSource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->bind(
            'App\Repositories\RepositoryInterface','App\Repositories\ORM\CsvRepository'
            );

       $this->app->bind(
            'App\Strategy\StrategyDataSource','App\Strategy\CsvDataSource'
           );


    }
}
