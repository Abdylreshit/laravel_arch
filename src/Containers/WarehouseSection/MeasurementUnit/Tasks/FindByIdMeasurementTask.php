<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FindByIdMeasurementTask extends Task
{
    public function execute($id)
    {
        return Measurement::query()->findOrFail($id);
    }
}
