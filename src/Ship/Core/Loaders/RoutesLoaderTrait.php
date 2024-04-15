<?php

namespace App\Ship\Core\Loaders;

use App\Ship\Core\Foundation\Facades\Porto;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

trait RoutesLoaderTrait
{
    /**
     * Register all the containers routes files in the framework
     */
    public function runRoutesAutoLoader(): void
    {
        $containersPaths = Porto::getAllContainerPaths();

        foreach ($containersPaths as $containerPath) {
            $containerName = Str::afterLast($containerPath, '/');

            $this->loadApiContainerRoutes($containerPath);
            $this->loadWebContainerRoutes($containerPath, $containerName);
        }
    }

    private function loadApiContainerRoutes(string $containerPath): void
    {
        $apiRoutesPath = $this->getRoutePathsForUI($containerPath, 'API');

        if (File::isDirectory($apiRoutesPath)) {
            $files = File::allFiles($apiRoutesPath);
            $files = Arr::sort($files, function ($file) {
                return $file->getFilename();
            });
            foreach ($files as $file) {
                $this->loadApiRoute($file);
            }
        }
    }

    private function getRoutePathsForUI(string $containerPath, string $ui): string
    {
        return $this->getUIPathForContainer($containerPath, $ui).DIRECTORY_SEPARATOR.'Routes';
    }

    private function getUIPathForContainer(string $containerPath, string $ui): string
    {
        return $containerPath.DIRECTORY_SEPARATOR.'UI'.DIRECTORY_SEPARATOR.$ui;
    }

    private function loadApiRoute(SplFileInfo $file): void
    {
        $routeGroupArray = $this->getRouteGroup($file);

        Route::group($routeGroupArray, function ($router) use ($file) {
            require $file->getPathname();
        });
    }

    public function getRouteGroup(SplFileInfo|string $endpointFileOrPrefixString): array
    {
        return [
            'middleware' => $this->getMiddlewares(),
            'domain' => $this->getApiUrl(),
            'prefix' => is_string($endpointFileOrPrefixString) ? $endpointFileOrPrefixString : $this->getApiVersionPrefix($endpointFileOrPrefixString),
        ];
    }

    private function getMiddlewares(): array
    {
        return array_filter([
            'api',
            $this->getRateLimitMiddleware(), // Returns NULL if feature disabled. Null will be removed form the array.
        ]);
    }

    private function getRateLimitMiddleware(): ?string
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        return null;
    }

    private function getApiUrl(): mixed
    {
        return Config::get('porto.api.url');
    }

    private function getApiVersionPrefix(SplFileInfo $file): string
    {
        return 'api/'.$this->getRouteFileVersionFromFileName($file).'/';
    }

    private function getRouteFileVersionFromFileName(SplFileInfo $file): string|bool
    {
        $fileNameWithoutExtension = $this->getRouteFileNameWithoutExtension($file);

        $fileNameWithoutExtensionExploded = explode('.', $fileNameWithoutExtension);

        return end($fileNameWithoutExtensionExploded);
    }

    private function getRouteFileNameWithoutExtension(SplFileInfo $file): string
    {
        return pathinfo($file->getFilename(), PATHINFO_FILENAME);
    }

    private function loadWebContainerRoutes($containerPath, $containerName): void
    {
        // build the container web routes path
        $webRoutesPath = $containerPath.'/UI/ADMIN/Routes';
        // build the namespace from the path
        $controllerNamespace = $containerPath.'/UI/ADMIN/Controllers';

        if (File::isDirectory($webRoutesPath)) {
            $files = File::allFiles($webRoutesPath);
            $files = Arr::sort($files, function ($file) {
                return $file->getFilename();
            });
            foreach ($files as $file) {
                $this->loadWebRoute($file, $controllerNamespace, $containerName);
            }
        }
    }

    private function loadWebRoute($file, $controllerNamespace, $containerName): void
    {
        Route::group([
            'namespace' => $controllerNamespace,
            'middleware' => ['web'],
            'prefix' => $this->getWebPrefix($containerName),
        ], function ($router) use ($file) {
            require $file->getPathname();
        });
    }

    private function getWebPrefix(string $containerName): string
    {
        return Str::lower($containerName);
    }
}
