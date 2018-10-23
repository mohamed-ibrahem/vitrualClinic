<?php

namespace App\Http\Middleware;

use Closure;

class AppBootstrapperMiddleware
{
    public function handle($request, Closure $next)
    {
        $this->generateMenus();

        return $next($request);
    }

    public function generateMenus()
    {
        $this->mainMenu();
        $this->socialMenu();
    }

    protected function mainMenu()
    {
        \Menu::make('main', function ($menu) {
            $menu->add('Home', ['route' => 'web.index']);

            if (\Auth::check()) {
                if (\Auth::user()->isAdmin()) {
                    //
                }
                if (\Auth::user()->isDoctor()) {
                    //
                }
                if (\Auth::user()->isMember()) {
                    //
                }
            }
        });
    }

    protected function socialMenu() {
        \Menu::make('socials', function($menu) {
            $facebook = $menu->add('facebook', '#');
            $twitter = $menu->add('twitter', '#');
            $google = $menu->add('google', '#');

            $facebook->link->attr(['class' => 'social-icon-color facebook', 'data-original-title' => 'facebook']);
            $twitter->link->attr(['class' => 'social-icon-color twitter', 'data-original-title' => 'twitter']);
            $google->link->attr(['class' => 'social-icon-color googleplus', 'data-original-title' => 'googleplus']);
        });
    }
}
