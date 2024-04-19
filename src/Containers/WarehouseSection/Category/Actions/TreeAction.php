<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Actions\Action;

class TreeAction extends Action
{
    public function handle()
    {
        return Category::query()
            ->withCount('children')
            ->orderBy('priority')
            ->when(config('category.image'), function ($query) {
                return $query->with('image');
            })
            ->get()
            ->toTree();
    }
}
