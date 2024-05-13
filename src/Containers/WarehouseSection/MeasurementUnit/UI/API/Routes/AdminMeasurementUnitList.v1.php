<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/measurement_unit/list', ListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.list');
