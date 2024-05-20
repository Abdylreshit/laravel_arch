<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementUpdateController;
use Illuminate\Support\Facades\Route;

Route::put('admin/measurement/{id}/update', MeasurementUpdateController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement.update');
