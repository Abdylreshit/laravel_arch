<?php

namespace App\Containers\UserSection\Staff\Actions;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Actions\Action;

class StaffListAction extends Action
{
    public function handle($filters = [])
    {
        return Staff::query()
            ->when(array_key_exists('search', $filters), function ($query) use ($filters) {
                $search = $filters['search'];

                return $query
                    ->where(fn($q) => $q->whereEmail($search))
                    ->orWhere(fn($q) => $q->whereFirstName($search))
                    ->orWhere(fn($q) => $q->whereLastName($search));
            })
            ->when(array_key_exists('sort', $filters), function ($query) use ($filters){
                return $query
                    ->join('users', 'users.id', '=', 'staff.user_id')
                    ->orderBy("users." . $filters['sort'])
                    ;
            })
            ->when(!array_key_exists('sort', $filters), function ($query) {
                return $query->orderBy('user_id');
            })
            ->with(['media', 'user'])
            ->paginate($filters['limit'] ?? 10);
    }
}
