<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Role;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class RoleCreateTask extends Task
{
    public function execute(array $data)
    {
        try {
            $role = Role::create([
                'name' => $data['name'],
                'trans_names' => [
                    'en' => $data['trans_names']['en'] ?? null,
                    'ru' => $data['trans_names']['ru'] ?? null
                ]
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $role;
    }
}
