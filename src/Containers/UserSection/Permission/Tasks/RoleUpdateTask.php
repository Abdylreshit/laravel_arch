<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Role;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class RoleUpdateTask extends Task
{
    public function execute($id, array $data)
    {
        $role = Role::query()->findOrFail($id);

        try {
            $role->update([
                'name' => $data['name'] ?? $role->name,
                'trans_names' => [
                    'en' => $data['trans_names']['en'] ?? $role->getTrans('trans_names', 'en'),
                    'ru' => $data['trans_names']['ru'] ?? $role->getTrans('trans_names', 'ru')
                ]
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $role;
    }
}
