<?php

namespace App\Containers\WarehouseSection\Price\Models;

use App\Containers\WarehouseSection\Price\Data\Factories\PriceFactory;
use App\Containers\WarehouseSection\Price\Models\Casts\PriceCast;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'price',
        'is_active',
        'valid_from',
        'valid_to',
    ];

    protected $casts = [
        'price' => PriceCast::class
    ];

    protected static function newFactory(): Factory|PriceFactory
    {
        return PriceFactory::new();
    }

//    public function currencyConversation()
//    {
//        return $this->belongsTo(CurrencyConversion::class, 'price_currency_conversion_id');
//    }
//
//    public function getPriceConvertedAttribute()
//    {
//        return $this->price * $this->priceCurrencyConversion->rate;
//    }
}
