<?php
/**
 * Menus.php
 * @project VirtualClinic - Oct/2018
 */

Menu::make('main', function ($menu) {
    $menu->add('Home', ['route' => 'web.index']);
});

Menu::make('socials', function($menu) {
    $facebook = $menu->add('facebook', '#');
    $twitter = $menu->add('twitter', '#');
    $google = $menu->add('google', '#');

    $facebook->link->attr(['class' => 'social-icon-color facebook', 'data-original-title' => 'facebook']);
    $twitter->link->attr(['class' => 'social-icon-color twitter', 'data-original-title' => 'twitter']);
    $google->link->attr(['class' => 'social-icon-color googleplus', 'data-original-title' => 'googleplus']);
});