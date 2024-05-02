<?php

namespace App\Containers\WarehouseSection\Supplier\Models;

use App\Containers\WarehouseSection\Supplier\Data\Factories\SupplierFactory;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'note',
    ];

    protected static function newFactory(): Factory|SupplierFactory
    {
        return SupplierFactory::new();
    }
}
