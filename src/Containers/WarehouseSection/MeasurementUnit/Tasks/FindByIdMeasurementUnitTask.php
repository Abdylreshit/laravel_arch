<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FindByIdMeasurementUnitTask extends Task
{
    public function execute($id): Builder|array|Collection|Model
    {
        return MeasurementUnit::query()->findOrFail($id);
    }
}
