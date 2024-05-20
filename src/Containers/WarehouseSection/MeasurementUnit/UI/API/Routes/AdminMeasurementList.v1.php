<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementListController;
use Illuminate\Support\Facades\Route;

Route::get('admin/measurement/list', MeasurementListController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement.list');
