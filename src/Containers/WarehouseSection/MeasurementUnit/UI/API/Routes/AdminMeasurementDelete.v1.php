<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementDeleteController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/measurement/{id}/delete', MeasurementDeleteController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement.delete');
