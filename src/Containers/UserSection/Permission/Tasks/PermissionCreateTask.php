<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Database\Eloquent\Model;

class PermissionCreateTask extends Task
{
    /**
     * @throws ResourceException
     */
    public function execute(array $data): Model
    {
        try {
            $permission = Permission::query()->create([
                'name' => $data['name'],
                'guard_name' => $data['guard_name'],
                'trans_names' => [
                    'en' => $data['trans_names']['en'] ?? null,
                    'ru' => $data['trans_names']['ru'] ?? null,
                ]
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $permission;
    }
}
