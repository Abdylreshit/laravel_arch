<?php

namespace App\Containers\UserSection\Managers;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Containers\UserSection\Permission\Models\Role;
use App\Containers\UserSection\Staff\Models\Staff;
use Illuminate\Support\Str;

class StaffPermissionManager
{
    public function attachPermissionToStaff(Staff $staff, Permission $permission): void
    {
        $staff->permissions()->attach($permission);
    }

    public function detachPermissionFromStaff(Staff $staff, Permission $permission): void
    {
        $staff->permissions()->detach($permission);
    }

    public function syncPermissionsToStaff(Staff $staff, array $permissions): void
    {
        $staff->permissions()->sync($permissions);
    }

    public function syncAllPermissionsToStaff(Staff $staff): void
    {
        $permissions = Permission::query()->get();

        $staff->permissions()->sync($permissions);
    }

    public function syncContainerPermissionsToStaff(Staff $staff, string $containerName): void
    {
        $containerName = Str::slug($containerName, '-');

        $permissions = Permission::query()
            ->where('name', 'like', "$containerName%")
            ->get();

        $staff->permissions()->sync($permissions);
    }

    public function syncRolesToStaff(Staff $staff, array $roles): void
    {
        $staff->roles()->sync($roles);

        $rls = Role::query()->whereIn('id', $roles)->get();

        $permissions = $rls->map(function ($role) {
            return $role->permissions;
        })->collapse()->pluck('id')->unique();

        $staff->permissions()->sync($permissions);
    }
}
