<?php

namespace App\Containers\AuthenticationSection\Sanctum\Actions\Admin;

use App\Ship\Core\Abstracts\Actions\Action;
use App\Containers\UserSection\Staff\Models\Staff;

class LogoutAction extends Action
{
    public function handle(Staff $staff):void
    {
        $staff->tokens()->delete();
    }
}
