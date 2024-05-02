<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Actions\Action;

class ListAction extends Action
{
    public function handle($filters)
    {
        return Category::query()
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
            ->when(config('category.image'), function ($query) {
                return $query->with('image');
            })
            ->paginate($filters['limit'] ?? 10);
    }
}
