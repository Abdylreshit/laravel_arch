<?php

namespace App\Ship\Core\Loaders;

use Illuminate\Support\Facades\File;

trait ConfigsLoaderTrait
{
    public function loadConfigsFromShip(): void
    {
        $shipConfigsDirectory = base_path('src/Ship/Configs');
        $this->loadConfigs($shipConfigsDirectory);
    }

    private function loadConfigs($configFolder): void
    {
        if (File::isDirectory($configFolder)) {
            $files = File::files($configFolder);

            foreach ($files as $file) {
                $name = File::name($file);
                $path = $configFolder . '/' . $name . '.php';

//                $config = $this->app->make('config');
//
//                $config->set($name, require $path);

                $this->mergeConfigFrom($path, $name);
            }
        }
    }

    public function loadConfigsFromContainers($containerPath): void
    {
        $containerConfigsDirectory = $containerPath . '/Configs';


        if (File::isDirectory($containerConfigsDirectory)) {
            $files = File::files($containerConfigsDirectory);

            foreach ($files as $file) {
                $name = File::name($file);
                $path = $containerConfigsDirectory . '/' . $name . '.php';

                $config = $this->app->make('config');

                $config->set($name, require $path);
            }
        }

    }
}
