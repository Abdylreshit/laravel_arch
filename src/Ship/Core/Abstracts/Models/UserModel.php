<?php

namespace App\Ship\Core\Abstracts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as LaravelAuthUser;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

abstract class UserModel extends LaravelAuthUser
{
    use HasFactory;
    use HasRelationships;
}
