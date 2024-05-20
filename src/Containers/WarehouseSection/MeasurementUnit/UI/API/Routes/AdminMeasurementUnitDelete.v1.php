<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementUnitDeleteController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/measurement_unit/{id}/delete', MeasurementUnitDeleteController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.delete');
