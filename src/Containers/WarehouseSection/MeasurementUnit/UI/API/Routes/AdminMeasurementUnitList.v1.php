<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementUnitListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/measurement_unit/list', MeasurementUnitListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.list');
