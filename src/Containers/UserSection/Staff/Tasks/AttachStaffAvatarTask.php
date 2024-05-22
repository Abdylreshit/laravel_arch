<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Str;

class AttachStaffAvatarTask extends Task
{
    public function execute(Staff $staff, $avatar): Staff
    {
        try {

            if (Str::isUrl($avatar)) {
                $staff
                    ->clearMediaCollection()
                    ->addMediaFromUrl($avatar)
                    ->toMediaCollection('default', 'staff_avatar');

                return $staff;
            }

            $staff
                ->clearMediaCollection()
                ->addMedia($avatar)
                ->toMediaCollection('default', 'staff_avatar');

            return $staff;
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }
    }
}
