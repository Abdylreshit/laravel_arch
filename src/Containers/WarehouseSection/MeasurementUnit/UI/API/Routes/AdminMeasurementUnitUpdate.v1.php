<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementUnitUpdateController;
use Illuminate\Support\Facades\Route;

Route::put('admin/measurement_unit/{id}/update', MeasurementUnitUpdateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.update');
