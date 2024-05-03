<?php

namespace App\Containers\WarehouseSection\Price\Models;

use App\Containers\WarehouseSection\Price\Data\Factories\CurrencyConversationFactory;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyConversation extends Model
{
    use SoftDeletes;

    protected $table = 'currency_conversations';

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
        return CurrencyConversationFactory::new();
    }
}
