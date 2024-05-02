<?php

namespace App\Containers\UserSection\User\Models;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\User\Data\Factories\UserFactory;
use App\Containers\UserSection\User\Enums\StatusEnum;
use App\Ship\Core\Abstracts\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends UserModel
{
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
        'locale',
    ];

    protected $casts = [
        'state' => StatusEnum::class,
    ];

    protected static function newFactory(): Factory|UserFactory
    {
        return UserFactory::new();
    }

    public function getFullNameAttribute(): string
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }
}
