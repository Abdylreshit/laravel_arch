<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementFindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/measurement/{id}/find', MeasurementFindController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement.find');
