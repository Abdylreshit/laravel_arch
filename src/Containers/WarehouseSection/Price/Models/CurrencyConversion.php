<?php

namespace App\Containers\WarehouseSection\Price\Models;

use App\Containers\WarehouseSection\Price\Data\Factories\CurrencyConversionFactory;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyConversion extends Model
{
    use SoftDeletes;

    protected $table = 'currency_conversions';

    protected $fillable = [
        'base_currency_id',
        'to_currency_id',
        'rate',
        'valid_from',
        'valid_to',
        'is_active',
        'note',
    ];

    protected static function newFactory()
    {
        return CurrencyConversionFactory::new();
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, 'to_currency_id');
    }
}
