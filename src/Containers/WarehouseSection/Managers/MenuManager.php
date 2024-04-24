<?php

namespace App\Containers\WarehouseSection\Managers;

use App\Containers\WarehouseSection\Category\Tasks\CreateCategoryTask;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tasks\CreateWarehouseTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\ListWarehouseTask;
use Illuminate\Support\Collection;

class MenuManager
{
    public function getMenu(array $filters = []): Collection
    {
        $collect = collect();

        $regionName = config('settings.REGION_NAME');

        $warehouses = app(ListWarehouseTask::class)->execute();

        $warehouses->load('categories');

        $collect->push(
            [
                'label' => 'Склады',
                'type' => 'tree',
                'data' => $warehouses->map(function ($warehouse) {
                    $categories = $warehouse->categories->toTree();

                    return [
                        'id' => $warehouse->id,
                        'model' => 'WAREHOUSE',
                        'parent_type' => 'REGION',
                        'parent_id' => 1,
                        'name' => $warehouse->name,
                        'query_param' => 'withWarehouses',
                        'children' => $this->getCategories($categories)
                    ];
                })->toArray()
            ],

            [
                'label' => 'Цены',
                'type' => 'range',
                'data' => [1, 1000],
            ],

            [
                'label' => 'Цвета',
                'type' => 'select',
                'data' => ['red', 'green'],
            ],
        );

        return $collect;
    }

    private function getCategories($categories)
    {
        return $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'model' => 'CATEGORY',
                'parent_type' => $category->parent_id ? 'CATEGORY' : 'WAREHOUSE',
                'parent_id' => $category->parent_id ?? $category->warehouse_id,
                'name' => $category->name,
                'query_param' => 'withCategories',
                'children' => $this->getCategories($category->children)
            ];
        })->toArray();
    }

    public function createTree(array $data): void
    {
        if ($data['model'] === 'CATEGORY') {

            if ($data['parent_type'] === 'CATEGORY') {
                app(CreateCategoryTask::class)->execute([
                    'name' => [
                        'en' => $data['name'],
                        'ru' => $data['name'],
                    ],
                    'parent_id' => $data['parent_id'],
                ]);
            }

            if ($data['parent_type'] === 'WAREHOUSE') {
                $warehouse = Warehouse::find($data['parent_id']);
                $category = app(CreateCategoryTask::class)->execute([
                    'name' => $data['name'],
                    'parent_id' => null,
                ]);

                $category->warehouse()->associate($warehouse);
            }
        }

        if ($data['model'] === 'WAREHOUSE') {
            app(CreateWarehouseTask::class)->execute([
                'name' => $data['name']
            ]);
        }
    }
}
