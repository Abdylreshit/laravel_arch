<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditUserByIdTask extends Task
{
    /**
     * @throws ResourceException
     */
    public function execute($id, array $data)
    {
        $user = User::query()->findOrFail($id);

        try {
            $user->update($data);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $user;
    }
}
