<?php

namespace App;

use Illuminate\Foundation\Application as LaravelApplication;

class BaseApplication extends LaravelApplication
{
    protected $namespace = 'App\\';

    protected $langPath = 'App\\Ship\\';

    /**
     * Get the path to the application configuration files.
     *
     * @param  string  $path
     */
    public function path($path = ''): string
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src/App'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * Get the path to the application configuration files.
     *
     * @param  string  $path
     */
    public function configPath($path = ''): string
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src/Ship/Configs'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * Get the path to the application configuration files.
     *
     * @param  string  $path
     */
    public function databasePath($path = ''): string
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src/Ship/Data'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}
