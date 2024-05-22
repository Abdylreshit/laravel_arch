<?php

namespace App\Containers\UserSection\Staff\Models;

use App\Containers\UserSection\Managers\Models\Traits\UserTrait;
use App\Containers\UserSection\Staff\Data\Factories\StaffFactory;
use App\Ship\Core\Abstracts\Models\Traits\WithMediaTrait;
use App\Ship\Core\Abstracts\Models\UserModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Staff extends UserModel implements HasMedia
{
    use HasApiTokens;
    use HasPermissions;
    use HasRoles;
    use SoftDeletes;
    use UserTrait;
    use WithMediaTrait;

    protected $fillable = [
        'user_id',
    ];

    protected static function newFactory()
    {
        return StaffFactory::new();
    }

    public function getAvatarAttribute()
    {
        return Str::length($this->getFirstMediaUrl()) == 0 ? url('avatar-placeholder.jpeg') : $this->getFirstMediaUrl();
    }
}
