<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tasks\UpdateOrCreateMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Unit\UnitTestCase;

class UpdateOrCreateMeasurementUnitTaskTest extends UnitTestCase
{
    public function testUpdateOrCreateMeasurementUnitTask()
    {
        $dataUpdate = MeasurementUnit::factory()->createOne();
        $dataUpdateMock = MeasurementUnit::factory()->makeOne();
        $dataCreate = MeasurementUnit::factory()->makeOne();

        app(UpdateOrCreateMeasurementUnitTask::class)
            ->execute(
                [
                    'code' => $dataUpdate->code,
                ],
                $dataUpdateMock->toArray()
            );

        $dataUpdate->refresh();

        $this->assertTrue($dataUpdate->symbol == $dataUpdateMock->symbol);
        //        $this->assertDatabaseHas(MeasurementUnit::class, ['code' => $dataUpdate->code]);

        app(UpdateOrCreateMeasurementUnitTask::class)
            ->execute(
                [
                    'code' => $dataCreate->code,
                ],
                $dataCreate->toArray()
            );

        $this->assertDatabaseHas(MeasurementUnit::class, ['code' => $dataCreate->code]);
    }
}
