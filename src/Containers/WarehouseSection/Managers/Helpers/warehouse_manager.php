<?php

use App\Containers\WarehouseSection\Managers\MenuManager;

if (! function_exists('getMenuManager')) {
    function getMenuManager(): MenuManager
    {
        return new MenuManager;
    }
}
