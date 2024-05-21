<?php

namespace App\Containers\UserSection\Permission\Actions;

use App\Containers\UserSection\Permission\Models\Role;
use App\Ship\Core\Abstracts\Actions\Action;

class RoleListAction extends Action
{
    public function handle($filters = [])
    {
        return Role::query()
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
