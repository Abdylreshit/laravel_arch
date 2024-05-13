<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

Route::put('admin/measurement_unit/{id}/update', UpdateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.update');
