<?php

namespace App\Containers\UserSection\Permission\Actions;

use App\Containers\UserSection\Permission\Tasks\RoleAttachPermissionsTask;
use App\Containers\UserSection\Permission\Tasks\RoleUpdateTask;
use App\Ship\Core\Abstracts\Actions\Action;
use Illuminate\Support\Str;

class RoleUpdateAction extends Action
{
    public function handle($id, array $data, array $permissions = [])
    {
        $role = app(RoleUpdateTask::class)->execute(
            $id,
            [
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
