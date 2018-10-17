<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VirtualClinicServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function() {
            $this->generateMenus();
        });
    }

    /**
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return void
     */
    protected function generateMenus()
    {
        require_once app_path('VirtualClinic/Menus.php');
    }
}
