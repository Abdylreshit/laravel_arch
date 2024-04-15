<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FindByIdCategoryTask extends Task
{
    public function execute($id): Builder|array|Collection|Model
    {
        return Category::query()->findOrFail($id);
    }
}
