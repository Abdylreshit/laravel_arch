<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Facades\Hash;

class EditStaffByIdTask extends Task
{
    public function execute($id, array $data)
    {
        try {
            $staff = Staff::query()->findOrFail($id);

            $user = $staff->user;

            $user->update([
                'firstname' => $data['firstname'] ?? $user->firstname,
                'lastname' => $data['lastname'] ?? $user->lastname,
                'email' => $data['email'] ?? $user->email,
                'phone' => $data['phone'] ?? $user->phone,
                'password' => $data['password'] ? Hash::make($data['password']) : $user->password,
                'is_blocked' => $data['is_blocked'],
            ]);

            $staff->refresh();
        } catch (\Exception $exception) {
            throw new ResourceException(['message' => $exception->getMessage()]);
        }

        return $staff;
    }
}
