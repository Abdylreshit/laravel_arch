<?php

namespace App\Containers\UserSection\Permission\Actions;

use App\Containers\UserSection\Permission\Tasks\RoleAttachPermissionsTask;
use App\Containers\UserSection\Permission\Tasks\RoleCreateTask;
use App\Ship\Core\Abstracts\Actions\Action;
use Illuminate\Support\Str;

class RoleCreateAction extends Action
{
    public function handle(array $data, array $permissions = [])
    {
        $role = app(RoleCreateTask::class)->execute([
            'name' => Str::upper(Str::slug($data['name']['en']) . '-' . Str::random(4)),
            'trans_names' => [
                'en' => $data['name']['en'],
                'ru' => $data['name']['ru']
            ]
        ]);

        if (!empty($permissions)) {
            app(RoleAttachPermissionsTask::class)->execute($role, $permissions);
        }

        return $role;
    }
}
