<?php

namespace App\Containers\UserSection\Permission\Data\Seeders;

use App\Containers\UserSection\Permission\Tasks\PermissionUpdateOrCreateTask;
use App\Ship\Core\Abstracts\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Str;

class PermissionSeeder extends ParentSeeder
{
    public function run(): void
    {
        $permissions = file_get_contents(__DIR__.'/../permissions.json');
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
        ];

        $crud = ['create', 'find', 'update', 'delete'];

        foreach ($crud as $action) {
            foreach ($containers as $container) {
                app(PermissionUpdateOrCreateTask::class)
                    ->execute(
                        [
                            'name' => Str::slug($container, '-').'-'.$action,
                            'guard_name' => 'admin',
                        ]);
            }
        }
    }
}
