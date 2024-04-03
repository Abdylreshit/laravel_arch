<?php

if (!function_exists('currentStaff')) {
    function currentStaff(): ?\App\Ship\Core\Abstracts\Models\UserModel
    {
        $staff = auth('admin')->user();

        return $staff;
    }
}

