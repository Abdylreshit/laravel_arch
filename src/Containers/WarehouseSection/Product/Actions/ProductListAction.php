<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Actions\Action;

class ProductListAction extends Action
{
    public function handle($filters)
    {
        return Product::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where(fn ($q) => $q->whereLikeLocale('name', "%$search%"))
                    ->orWhere(fn ($q) => $q->whereLikeLocale('description', "%$search%"));
            })
            ->when(array_key_exists('sort', $filters), function ($query) use ($filters) {
                return $query->orderBy($filters['sort']);
            })
            ->when(! array_key_exists('sort', $filters), function ($query) {
                return $query->orderBy('priority');
            })
            ->with([
                'media',
            ])
            ->when(array_key_exists('WAREHOUSE', $filters), function ($query) use ($filters){
                return $query->whereHas('stocks', function ($q) use ($filters){
                    $q->where('warehouse_id', $filters['WAREHOUSE']);
                });
            })
            ->when(array_key_exists('CATEGORY', $filters), function ($query) use ($filters){
                return $query->withAnyCategories($filters['CATEGORY']);
            })
            ->withSum('stocks', 'quantity')
            ->withSum('stocks', 'on_hand')
            ->withSum('stocks', 'on_reserve')
            ->paginate($filters['limit'] ?? 10);
    }
}
