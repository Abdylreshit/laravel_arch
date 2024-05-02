<?php

namespace App\Containers\WarehouseSection\Price\Models;

use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;
    use TranslateTrait;

    protected $table = 'currencies';

    protected $fillable = [
        'name',
        'code',
        'symbol',
    ];

    public $translatable = [
        'name'
    ];
}
