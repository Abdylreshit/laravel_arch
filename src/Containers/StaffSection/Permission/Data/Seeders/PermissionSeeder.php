<?php

namespace App\Containers\StaffSection\Permission\Data\Seeders;

use App\Containers\StaffSection\Permission\Tasks\PermissionUpdateOrCreateTask;
use App\Ship\Core\Abstracts\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Str;

class PermissionSeeder extends ParentSeeder
{
    public function run(): void
    {
        $permissions = file_get_contents(base_path('src/Containers/StaffSection/Permission/Data/permissions.json'));
        $permissions = json_decode($permissions, true);

        foreach ($permissions as $permission) {
            app(PermissionUpdateOrCreateTask::class)
                ->execute(
                    [
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
        }

        $crud = ['create', 'find', 'update', 'delete'];

        $containers = [
            'MeasurementUnit',
            'Category',
        ];

        foreach($crud as $action) {
            foreach ($containers as $container) {
                app(PermissionUpdateOrCreateTask::class)
                    ->execute(
                        [
                            'name' => Str::slug($container,'-') . '-' . $action,
                            'guard_name' => 'admin',
                        ]);
            }
        }
    }
}
