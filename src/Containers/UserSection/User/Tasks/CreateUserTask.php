<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Facades\Hash;

class CreateUserTask extends Task
{
    public function execute(array $data)
    {

        try {
            $user = User::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'timezone' => $data['timezone'],
                'password' => Hash::make($data['password']),
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $user;
    }
}
