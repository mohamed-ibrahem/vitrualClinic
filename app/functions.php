<?php

if (! function_exists('assets_dir')) {
    function assets_dir($path, $secure = null) {
        $path = pathinfo($path);
        $filename = explode('.', $path['filename']);

        $path = ($path['dirname'] . '/' . $filename[0] . '-' . LaravelLocalization::getCurrentLocale() . '.' . $filename[1] . '.' . $path['extension']);
        return asset($path, $secure);
    }
}
