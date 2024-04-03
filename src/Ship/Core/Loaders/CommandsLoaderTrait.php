<?php

namespace App\Ship\Core\Loaders;

use App\Ship\Core\Foundation\Facades\Porto;
use Illuminate\Support\Facades\File;

trait CommandsLoaderTrait
{
    public function loadCommandsFromContainers($containerPath): void
    {
        $containerCommandsDirectory = $containerPath.'/Commands';
        $this->loadTheConsoles($containerCommandsDirectory);
    }

    private function loadTheConsoles($directory): void
    {
        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $consoleFile) {
                // Do not load route files
                if (! $this->isRouteFile($consoleFile)) {
                    $consoleClass = Porto::getClassFullNameFromFile($consoleFile->getPathname());
                    // When user from the Main Service Provider, which extends Laravel
                    // service provider you get access to `$this->commands`
                    $this->commands([$consoleClass]);
                }
            }
        }
    }

    private function isRouteFile($consoleFile): bool
    {
        return $consoleFile->getFilename() === 'closures.php';
    }

    public function loadCommandsFromShip(): void
    {
        $shipCommandsDirectory = base_path('src/Ship/Commands');
        $this->loadTheConsoles($shipCommandsDirectory);
    }

    public function loadCommandsFromCore(): void
    {
        $coreCommandsDirectory = base_path('src/Ship/Core/Commands');
        $this->loadTheConsoles($coreCommandsDirectory);
    }
}
