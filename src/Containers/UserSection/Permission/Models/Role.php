<?php

namespace App\Containers\UserSection\Permission\Models;

use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use TranslateTrait;
    use SoftDeletes;

    protected $translatable = [
        'trans_names',
    ];
}
