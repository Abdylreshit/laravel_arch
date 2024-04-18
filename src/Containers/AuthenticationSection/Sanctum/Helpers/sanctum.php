<?php

if (! function_exists('currentStaff')) {
    function currentStaff(): ?\App\Containers\UserSection\Staff\Models\Staff
    {
        $staff = auth('admin')->user();

        return $staff;
    }
}

if (! function_exists('currentRider')) {
    function currentRider(): ?Rider
    {
        $rider = auth('rider')->user();

        return $rider;
    }
}
