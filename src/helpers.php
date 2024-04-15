<?php

use Illuminate\Support\Str;

if (! function_exists('getSectionName')) {
    function getSectionName($name): string
    {
        $key = Str::replace('App\Containers\\', '', $name);

        return Str::before($key, '\\');
    }
}

if (! function_exists('getContainerName')) {
    function getContainerName($name): string
    {
        $key = Str::replace('App\Containers\\', '', $name);
        $key = Str::after($key, '\\');

        return Str::before($key, '\\');
    }
}

if (! function_exists('getBaseLocales')) {
    function getBaseLocales(): array
    {
        return [
            'ru',
            'en',
        ];
    }
}
