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

    public function conversations()
    {
        return $this->hasMany(CurrencyConversation::class, 'to_currency_id');
    }

    public function actualConversation()
    {
        return $this->hasOne(CurrencyConversation::class, 'to_currency_id')
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->latest()
            ;
    }
}
