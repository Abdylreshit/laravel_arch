<?php

namespace App\Containers\AuthenticationSection\Sanctum\Actions\Admin;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Actions\Action;

class LogoutAction extends Action
{
    public function handle(Staff $staff): void
    {
        $staff->tokens()->delete();
    }
}
