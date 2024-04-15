<?php

namespace App\Containers\StaffSection\Staff\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Facades\Hash;

class CreateStaffTask extends Task
{
    public function execute(array $data)
    {

        try {
            $staff = Staff::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'timezone' => $data['timezone'],
                'password' => Hash::make($data['password']),
            ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $staff;
    }
}
