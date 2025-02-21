<?php

namespace App\Ship\Core\Loaders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait ViewsLoaderTrait
{
    public function loadViewsFromContainers($containerPath): void
    {
        $containerViewDirectory = $containerPath.'/UI/ADMIN/Views/';
        $containerMailTemplatesDirectory = $containerPath.'/Mails/Templates/';

        $containerName = basename($containerPath);
        $pathParts = explode(DIRECTORY_SEPARATOR, $containerPath);
        $sectionName = $pathParts[count($pathParts) - 2];

        $this->loadViews($containerViewDirectory, $containerName, $sectionName);
        $this->loadViews($containerMailTemplatesDirectory, $containerName, $sectionName);
    }

    private function loadViews($directory, $containerName, $sectionName = null): void
    {
        if (File::isDirectory($directory)) {
            $this->loadViewsFrom($directory, $this->buildViewNamespace($sectionName, $containerName));
        }
    }

    private function buildViewNamespace(?string $sectionName, string $containerName): string
    {
        return $sectionName ? ($sectionName.'@'.$containerName) : Str::camel($containerName);
    }

    public function loadViewsFromShip(): void
    {
        $shipMailTemplatesDirectory = base_path('src/Ship/Mails/Templates/');
        $this->loadViews($shipMailTemplatesDirectory, 'ship'); // Ship views accessible via `ship::`.
    }
}
