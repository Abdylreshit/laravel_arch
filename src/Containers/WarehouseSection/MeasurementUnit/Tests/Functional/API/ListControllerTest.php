<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\API;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tests\Functional\ApiTestCase;

class ListControllerTest extends ApiTestCase
{
    public function testListController()
    {
        MeasurementUnit::factory()->count(10)->create();

        $request = $this
            ->withToken($this->getStaffToken())
            ->json('GET', 'api/v1/admin/measurement_unit/list');

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'measurement_units' => [
                    '*' => [
                        'id',
                        'code',
                        'name',
                        'description',
                        'symbol',
                        'type',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testListControllerSortById()
    {
        MeasurementUnit::factory()->count(10)->create();

        $request = $this
            ->withToken($this->getStaffToken())
            ->json('GET', 'api/v1/admin/measurement_unit/list', ['sort' => 'id']);

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'measurement_units' => [
                    '*' => [
                        'id',
                        'code',
                        'name',
                        'description',
                        'symbol',
                        'type',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testListControllerSortByCreatedAt()
    {
        MeasurementUnit::factory()->count(10)->create();
        $request = $this
            ->withToken($this->getStaffToken())
            ->json('GET', 'api/v1/admin/measurement_unit/list', ['sort' => 'created_at']);

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'measurement_units' => [
                    '*' => [
                        'id',
                        'code',
                        'name',
                        'description',
                        'symbol',
                        'type',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testListControllerSortByCode()
    {
        MeasurementUnit::factory()->count(10)->create();

        $request = $this
            ->withToken($this->getStaffToken())
            ->json('GET', 'api/v1/admin/measurement_unit/list', ['sort' => 'code']);

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'measurement_units' => [
                    '*' => [
                        'id',
                        'code',
                        'name',
                        'description',
                        'symbol',
                        'type',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testListControllerSearch()
    {
        MeasurementUnit::factory()->count(10)->create();

        $request = $this
            ->withToken($this->getStaffToken())
            ->json('GET', 'api/v1/admin/measurement_unit/list', [
                'search' => MeasurementUnit::query()->inRandomOrder()->first()->name,
            ]);

        $request->assertOk();
        $request->assertJsonStructure(
            [
                'measurement_units' => [
                    '*' => [
                        'id',
                        'code',
                        'name',
                        'description',
                        'symbol',
                        'type',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }
}
