<?php

namespace App\Containers\WarehouseSection\Managers;

use App\Containers\WarehouseSection\Category\Tasks\CreateCategoryTask;
use App\Containers\WarehouseSection\Category\Tasks\EditByIdCategoryTask;
use App\Containers\WarehouseSection\Category\Tasks\FindByIdCategoryTask;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tasks\CreateWarehouseTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\EditWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\FindWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\ListWarehouseTask;
use Illuminate\Support\Collection;

class MenuManager
{
    public function getMenu(array $filters = []): Collection
    {
        $collect = collect();

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
            ]
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

    public function findMenuItem(array $data)
    {
        if ($data['model'] === 'CATEGORY') {
            $result = app(FindByIdCategoryTask::class)->execute($data['id']);
        }

        if ($data['model'] === 'WAREHOUSE') {
            $result = app(FindWarehouseByIdTask::class)->execute($data['id']);
        }

        return [
            'id' => $result->id,
            'model' => $data['model'],
            'name' => $result->name,
            'parent_id' => $data['model'] === 'CATEGORY' ? $result->parent_id : null,
            'parent_type' => $result->parent_id ? 'CATEGORY' : 'WAREHOUSE',
        ];
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

    public function editTree(array $data)
    {
        if ($data['model'] === 'CATEGORY') {
            app(EditByIdCategoryTask::class)->execute(
                $data['id'],
                [
                    'name' => [
                        'en' => $data['name'],
                        'ru' => $data['name'],
                    ],
                    'parent_id' => $data['parent_id'],
                ]
            );
        }

        if ($data['model'] === 'WAREHOUSE') {
            app(EditWarehouseByIdTask::class)->execute(
                $data['id'],
                [
                    'name' => $data['name'],
                ]
            );
        }
    }
}
