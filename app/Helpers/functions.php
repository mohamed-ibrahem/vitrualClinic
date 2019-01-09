<?php

if (! function_exists('assets_dir')) {
    function assets_dir($path, $secure = null) {
        $path = pathinfo($path);
        $filename = explode('.', $path['filename']);
        $dir = trans('general.dir');
        $dir = $dir ? ('-' . $dir) : '';

        $path = ($path['dirname'] . '/' . $filename[0] . $dir . (isset($filename[1]) ? '.' . $filename[1] : '') . '.' . $path['extension']);
        return asset($path, $secure);
    }
}

if (! function_exists('setting')) {
    function setting($key = null, $default = null) {
        if ($key)
            return (new \App\Setting)->search(
                str_replace('.', '_', $key),
                $default
            );

        return new \App\Setting;
    }
}
