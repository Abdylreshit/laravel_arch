<?php

namespace App\Ship\Core\Loaders;

use App\Ship\Core\Foundation\Facades\Porto;

trait AutoLoaderTrait
{
    use AliasesLoaderTrait;
    use CommandsLoaderTrait;

    // Using each component loader trait
    use ConfigsLoaderTrait;
    use HelpersLoaderTrait;
    use LocalizationLoaderTrait;
    use MigrationsLoaderTrait;
    use ProvidersLoaderTrait;
    use ViewsLoaderTrait;

    /**
     * To be used from the `boot` function of the main service provider
     */
    //    public function runLoadersBoot(): void
    //    {
    //        $this->loadMigrationsFromShip();
    //        $this->loadLocalsFromShip();
    //        $this->loadViewsFromShip();
    //        $this->loadHelpersFromShip();
    //        $this->loadCommandsFromShip();
    //        $this->loadCommandsFromCore();
    //
    //        // Iterate over all the containers folders and autoload most of the components
    //        foreach (Porto::getAllContainerPaths() as $containerPath) {
    //            $this->loadMigrationsFromContainers($containerPath);
    //            $this->loadLocalsFromContainers($containerPath);
    //            $this->loadViewsFromContainers($containerPath);
    //            $this->loadHelpersFromContainers($containerPath);
    //            $this->loadCommandsFromContainers($containerPath);
    //        }
    //    }
    //
    //    public function runLoaderRegister(): void
    //    {
    //        $this->loadConfigsFromShip();
    //        $this->loadOnlyShipProviderFromShip();
    //
    //        foreach (Porto::getAllContainerPaths() as $containerPath) {
    //            $this->loadConfigsFromContainers($containerPath);
    //            $this->loadOnlyMainProvidersFromContainers($containerPath);
    //        }
    //    }

    /**
     * To be used from the `boot` function of the main service provider.
     */
    public function runLoadersBoot(): void
    {
        $this->loadMigrationsFromShip();
        $this->loadLocalsFromShip();
        $this->loadViewsFromShip();
        $this->loadHelpersFromShip();
        $this->loadCommandsFromShip();
        $this->loadCommandsFromCore();

        // Iterate over all the containers folders and autoload most of the components
        foreach (Porto::getAllContainerPaths() as $containerPath) {
            $this->loadMigrationsFromContainers($containerPath);
            $this->loadLocalsFromContainers($containerPath);
            $this->loadViewsFromContainers($containerPath);
            $this->loadHelpersFromContainers($containerPath);
            $this->loadCommandsFromContainers($containerPath);
        }
    }

    public function runLoaderRegister(): void
    {
        $this->loadConfigsFromShip();
        $this->loadOnlyShipProviderFromShip();

        foreach (Porto::getAllContainerPaths() as $containerPath) {
            $this->loadConfigsFromContainers($containerPath);
            $this->loadOnlyMainProvidersFromContainers($containerPath);
        }
    }
}
