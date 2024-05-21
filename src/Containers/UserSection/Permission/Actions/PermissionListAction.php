<?php

namespace App\Containers\UserSection\Permission\Actions;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Actions\Action;

class PermissionListAction extends Action
{
    public function handle($filters = [])
    {
        return Permission::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where('name', "%$search%")
                    ->orWhere(fn ($q) => $q->whereLikeLocale('trans_names', "%$search%"));
            })
            ->when(array_key_exists('sort', $filters), function ($query) use ($filters) {
                return $query->orderBy($filters['sort']);
            })
            ->when(! array_key_exists('sort', $filters), function ($query) {
                return $query->orderBy('id');
            })
            ->get();
    }
}
