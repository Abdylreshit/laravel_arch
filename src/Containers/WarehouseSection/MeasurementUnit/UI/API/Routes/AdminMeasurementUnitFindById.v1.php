<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\MeasurementUnitFindController;
use Illuminate\Support\Facades\Route;

Route::get('admin/measurement_unit/{id}/find', MeasurementUnitFindController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.find');
