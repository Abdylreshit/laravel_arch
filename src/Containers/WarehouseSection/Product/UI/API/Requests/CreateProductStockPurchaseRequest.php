<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Requests;

use App\Containers\WarehouseSection\Product\Enums\ProductType;
use App\Ship\Core\Abstracts\Requests\Request;
use BenSampo\Enum\Rules\EnumValue;

class CreateProductStockPurchaseRequest extends Request
{
    public function rules(): array
    {
        return [
            'note' => ['required', 'string'],
            'items' => ['required', 'array'],
            'items.*.stock_id' => ['required', 'integer', 'exists:stocks,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
            'items.*.purchase_price' => ['required', 'numeric', 'min:0'],
            'items.*.purchase_price_currency_id' => ['required', 'integer', 'exists:currencies,id'],
        ];
    }
}
