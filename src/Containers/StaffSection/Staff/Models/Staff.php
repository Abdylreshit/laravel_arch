<?php

namespace App\Containers\StaffSection\Staff\Models;

use App\Containers\StaffSection\Staff\Data\Factories\StaffFactory;
use App\Containers\StaffSection\Staff\Enums\StateEnum;
use App\Ship\Core\Abstracts\Models\UserModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Staff extends UserModel
{
    use HasApiTokens;
    use HasPermissions;
    use HasRoles;
    use SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'timezone',

        'is_blocked',
        'state',
    ];

    protected $casts = [
        'state' => StateEnum::class,
    ];

    protected static function newFactory(): StaffFactory
    {
        return StaffFactory::new();
    }
}
