<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Model;

class FindByNamePermissionTask extends Task
{
    public function execute(string $name): Model
    {
        return Permission::query()->where('name', $name)->firstOrFail();
    }
}
