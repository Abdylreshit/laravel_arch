<?php

namespace App\Containers\UserSection\Permission\UI\API\Controllers;

use App\Containers\UserSection\Permission\Actions\RoleRestoreAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class RoleRestoreController extends ApiController
{
    public function __invoke(Request $request)
    {
        $role = RoleRestoreAction::run($request->id);

        return $this->successResponse([
            'role' => [
                'id' => $role->id,
                'name' => [
                    'en' => $role->getTrans('trans_names', 'en'),
                    'ru' => $role->getTrans('trans_names', 'ru'),
                ],
                'value' => $role->name,
                'permissions' => $role->permissions->pluck('name')->toArray(),
            ],
        ]);
    }
}
