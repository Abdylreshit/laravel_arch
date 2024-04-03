<?php

namespace App\Containers\StaffSection\Staff\Models;

use App\Containers\StaffSection\Staff\Data\Factories\StaffFactory;
use App\Ship\Core\Abstracts\Models\UserModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;

class Staff extends UserModel
{
    use HasApiTokens;
    use SoftDeletes;
    use HasPermissions;

    protected $fillable = [
        "firstname",
        "lastname",
        "email",
        "password",
        "phone",
        "timezone",
    ];

    protected $hidden = [
        'password'
    ];

    protected static function newFactory(): StaffFactory
    {
        return StaffFactory::new();
    }
}
