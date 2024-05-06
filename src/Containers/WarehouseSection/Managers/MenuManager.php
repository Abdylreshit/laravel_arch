<?php

namespace App\Containers\WarehouseSection\Managers;

use App\Containers\WarehouseSection\Category\Tasks\CreateCategoryTask;
use App\Containers\WarehouseSection\Category\Tasks\DeleteByIdCategoryTask;
use App\Containers\WarehouseSection\Category\Tasks\EditByIdCategoryTask;
use App\Containers\WarehouseSection\Category\Tasks\FindByIdCategoryTask;
use App\Containers\WarehouseSection\Category\Tasks\RestoreCategoryByIdTask;
use App\Containers\WarehouseSection\EAV\Enums\PropertyType;
use App\Containers\WarehouseSection\Managers\Tasks\AssociateWarehouseToCategory;
use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\Warehouse\Tasks\CreateWarehouseTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\DeleteWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\EditWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\FindWarehouseByIdTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\ListWarehouseTask;
use App\Containers\WarehouseSection\Warehouse\Tasks\RestoreWarehouseByIdTask;
use App\Ship\Exceptions\ModelNotFoundException;
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
                'key' => 'ENNBN',
                'query_params' => ['WAREHOUSE', 'CATEGORY'],
                'data' => $warehouses->map(function ($warehouse) {
                    $categories = $warehouse->categories->toTree(false, ['name.ru']);

                    return [
                        'id' => $warehouse->id,
                        'model' => 'WAREHOUSE',
                        'parent_type' => 'REGION',
                        'parent_id' => 1,
                        'name' => $warehouse->name,
                        'query_param' => 'WAREHOUSE',
                        'children' => $this->getCategories($categories),
                    ];
                })->toArray(),
            ],

            [
                'label' => 'Тип склада',
                'type' => 'switch',
                'key' => '3QQWJ',
                'query_params' => 'withTypeWarehouse',
                'data' => [
                    [
                        'label' => 'Склад',
                        'value' => 'WAREHOUSE',
                        'query_param' => 'withTypeWarehouse',
                    ],
                    [
                        'label' => 'Витрина',
                        'value' => 'SHOWCASE',
                        'query_param' => 'withTypeWarehouse',
                    ],
                ],
            ],

            [
                'label' => 'Улица',
                'type' => 'select',
                'key' => 'H30NP',
                'query_params' => 'withStreet',
                'data' => [
                    [
                        'label' => 'Улица 1',
                        'value' => 'STREET1',
                        'query_param' => 'withStreet',
                    ],
                    [
                        'label' => 'Улица 2',
                        'value' => 'STREET2',
                        'query_param' => 'withStreet',
                    ],
                    [
                        'label' => 'Улица 3',
                        'value' => 'STREET3',
                        'query_param' => 'withStreet',
                    ],
                    [
                        'label' => 'Улица 4',
                        'value' => 'STREET4',
                        'query_param' => 'withStreet',
                    ],
                    [
                        'label' => 'Улица 5',
                        'value' => 'STREET5',
                        'query_param' => 'withStreet',
                    ],
                ],
            ],

            [
                'label' => 'Дом',
                'type' => 'input',
                'key' => 'AB7LM',
                'query_params' => 'withHouse',
                'data' => [
                    'placeholder' => 'Введите номер дома',
                    'query_param' => 'withHouse',
                ],
            ],

            [
                'label' => 'Цена',
                'type' => 'range',
                'key' => 'SSDM9',
                'query_params' => 'withPrice',
                'data' => [
                    'min' => 0,
                    'max' => 100000,
                    'query_param_min' => 'withMinPrice',
                    'query_param_max' => 'withMaxPrice',
                ],
            ],

            [
                'label' => 'Дата создания',
                'type' => 'date',
                'key' => 'IWCWR',
                'query_params' => 'withCreatedAt',
                'data' => [
                    'query_param' => 'withCreatedAt',
                ],
            ],

            [
                'label' => 'Цвет',
                'type' => 'color',
                'key' => '4ATVI',
                'query_params' => 'withColor',
                'data' => $this->getColors()
            ]
        );

        return $collect;
    }

    private function getColors()
    {
        return Property::query()
            ->with('values')
            ->where('type', PropertyType::COLOR)
            ->orderBy('id')
            ->first()
            ->values
            ->map(function ($property) {
                return [
                    'label' => $property->getTrans('name'),
                    'value' => $property->id,
                    'query_param' => 'withColor',
                ];
        })
            ->toArray();
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
                'query_param' => 'CATEGORY',
                'children' => $this->getCategories($category->children),
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

        throw_if(empty($result), ModelNotFoundException::class);

        if ($data['model'] === 'CATEGORY') {
            $parentType = $result->parent_id ? 'CATEGORY' : 'WAREHOUSE';
            $parentId = $result->parent_id ?? $result->warehouse_id;
        } else {
            $parentType = 'REGION';
            $parentId = 1;
        }

        return [
            'id' => $result->id,
            'model' => $data['model'],
            'name' => $result->name,
            'parent_id' => $parentId,
            'parent_type' => $parentType,
            'parent_name' => $result->parent_id ? $result->parent->getTrans('name') : $result->warehouse?->name,
        ];
    }

    public function createTree(array $data): void
    {
        if (array_key_exists('parent_type', $data)) {
            if ($data['parent_type'] === 'CATEGORY') {
                $parentCategory = app(FindByIdCategoryTask::class)->execute($data['parent_id']);

                $category = app(CreateCategoryTask::class)->execute([
                    'name' => [
                        'en' => $data['name'],
                        'ru' => $data['name'],
                    ],
                    'parent_id' => $data['parent_id'],
                ]);

                app(AssociateWarehouseToCategory::class)->execute($parentCategory->warehouse, $category);

                return;
            }

            if ($data['parent_type'] === 'WAREHOUSE') {
                $warehouse = app(FindWarehouseByIdTask::class)->execute($data['parent_id']);
                $category = app(CreateCategoryTask::class)->execute([
                    'name' => [
                        'en' => $data['name'],
                        'ru' => $data['name'],
                    ],
                ]);

                app(AssociateWarehouseToCategory::class)->execute($warehouse, $category);

                return;
            }
        }

        app(CreateWarehouseTask::class)->execute([
            'name' => $data['name'],
        ]);
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

    public function deleteTree(array $data)
    {
        if ($data['model'] === 'CATEGORY') {
            app(DeleteByIdCategoryTask::class)->execute($data['id']);
        }

        if ($data['model'] === 'WAREHOUSE') {
            app(DeleteWarehouseByIdTask::class)->execute($data['id']);
        }
    }

    public function restoreTree(array $data): void
    {
        if ($data['model'] === 'CATEGORY') {
            app(RestoreCategoryByIdTask::class)->execute($data['id']);
        }

        if ($data['model'] === 'WAREHOUSE') {
            app(RestoreWarehouseByIdTask::class)->execute($data['id']);
        }
    }
}
