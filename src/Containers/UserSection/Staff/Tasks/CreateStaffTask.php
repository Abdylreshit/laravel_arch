<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Facades\Hash;

class CreateStaffTask extends Task
{
    public function execute(array $data)
    {
        try {
            $user = User::query()
                ->where('email', $data['email'])
                ->first();

            if ($user == null) {
                $user = User::create([
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => Hash::make($data['password']),
                    'is_blocked' => $data['is_blocked'],
                ]);
            }

            if ($user->staff != null) return $user->staff;

            $staff = Staff::create([
                'user_id' => $user->id,
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $staff;
    }
}
