<?php

namespace App\Containers\WarehouseSection\Price\Models;

use App\Containers\WarehouseSection\Price\Data\Factories\CurrencyFactory;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
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

    protected static function newFactory(): Factory|CurrencyFactory
    {
        return CurrencyFactory::new();
    }

    public function conversions()
    {
        return $this->hasMany(CurrencyConversion::class, 'to_currency_id');
    }

    public function actualConversion($validFrom = null, $validTo = null)
    {
        $validFrom = $validFrom ?? now();
        $validTo = $validTo ?? now();

        return $this
            ->conversions()
            ->where('valid_from', '<=', $validFrom)
            ->where('valid_to', '>=', $validTo)
            ->where('is_active', true)
            ->latest()
            ->firstOrFail();
    }
}
