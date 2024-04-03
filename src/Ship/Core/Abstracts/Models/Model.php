<?php

namespace App\Ship\Core\Abstracts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as LaravelEloquentModel;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

abstract class Model extends LaravelEloquentModel
{
    use HasFactory;
    use HasRelationships;
}
