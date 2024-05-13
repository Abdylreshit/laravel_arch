<?php

use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers\DeleteController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/measurement_unit/{id}/delete', DeleteController::class)
    ->middleware([
        'auth:admin',
    ])
    ->name('admin.measurement_unit.delete');
