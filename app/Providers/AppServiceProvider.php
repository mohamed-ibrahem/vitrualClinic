<?php

namespace App\Providers;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::macro('range', function ($start, $interval, $end) {
            return collect(new DatePeriod($start, $interval, $end));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
