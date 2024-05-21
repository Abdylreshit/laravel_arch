<?php

namespace App\Containers\UserSection\Permission\Data\Seeders;

use App\Containers\UserSection\Permission\Tasks\PermissionUpdateOrCreateTask;
use App\Ship\Core\Abstracts\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Str;

class PermissionSeeder extends ParentSeeder
{
    public function run(): void
    {
        $permissions = file_get_contents(__DIR__ . '/../permissions.json');
        $permissions = json_decode($permissions, true);

        foreach ($permissions as $permission) {
            app(PermissionUpdateOrCreateTask::class)
                ->execute(
                    [
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
        }

        $this->containerPermissionsCreate();
    }

    private function containerPermissionsCreate(): void
    {
        $containers = [
            'MeasurementUnit',
            'Category',
            'Warehouse',
            'Supplier',
            'EAV',
            'Product',
            'Stock',
            'Price',
            'Discount',
            'Order',
            'User',
            'Role'
        ];

        $crud = ['create', 'find', 'update', 'delete'];

        foreach ($crud as $action) {
            foreach ($containers as $container) {

                switch ($action) {
                    case 'create':
                        $enName = 'Create ' . Str::slug($container, '-');
                        $ruName = 'Создание ' . Str::slug($container, '-');
                        break;
                    case 'find':
                        $enName = 'View ' . Str::slug($container, '-');
                        $ruName = 'Просмотр ' . Str::slug($container, '-');
                        break;
                    case 'update':
                        $enName = 'Update ' . Str::slug($container, '-');
                        $ruName = 'Обновление ' . Str::slug($container, '-');
                        break;
                    case 'delete':
                        $enName = 'Delete ' . Str::slug($container, '-');
                        $ruName = 'Удаление ' . Str::slug($container, '-');
                        break;
                }

                app(PermissionUpdateOrCreateTask::class)
                    ->execute(
                        [
                            'name' => Str::slug($container, '-') . '-' . $action,
                            'guard_name' => 'admin',

                        ],
                        [
                            'trans_names' => [
                                'en' => $enName,
                                'ru' => $ruName,
                            ]
                        ]
                    );
            }
        }
    }
}
