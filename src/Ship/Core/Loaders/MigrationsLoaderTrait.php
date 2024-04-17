<?php

namespace App\Ship\Core\Loaders;

use Illuminate\Support\Facades\File;

trait MigrationsLoaderTrait
{
    public function loadMigrationsFromContainers($containerPath): void
    {
        $containerMigrationDirectory = $containerPath.'/Data/migrations';
        $this->loadMigrations($containerMigrationDirectory);
    }

    private function loadMigrations($directory): void
    {
        dd($directory);

        if (File::isDirectory($directory)) {
            $this->loadMigrationsFrom($directory);
        }
    }

    public function loadMigrationsFromShip(): void
    {
        $shipMigrationDirectory = base_path('src/Ship/Data/migrations');
        $this->loadMigrations($shipMigrationDirectory);
    }
}
