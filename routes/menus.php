<?php

/**
 * @project VirtualClinic
 */
Menu::make('main', function ($menu) {
    $menu->add('Home', ['route' => 'web.index']);
});

Menu::make('socials', function($menu) {
    $facebook = $menu->add('facebook', '#');
    $twitter = $menu->add('twitter', '#');
    $google = $menu->add('google', '#');

    $facebook->link->attr(['class' => 'facebook', 'data-original-title' => 'facebook']);
    $twitter->link->attr(['class' => 'twitter', 'data-original-title' => 'twitter']);
    $google->link->attr(['class' => 'googleplus', 'data-original-title' => 'googleplus']);
});
