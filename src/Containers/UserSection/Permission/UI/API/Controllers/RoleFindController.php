<?php

namespace App\Containers\UserSection\Permission\UI\API\Controllers;

use App\Containers\UserSection\Permission\Actions\RoleFindAction;
use App\Containers\UserSection\Permission\UI\API\Resources\MainPermissionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class RoleFindController extends ApiController
{
    public function __invoke(Request $request)
    {
        $role = RoleFindAction::run($request->id);

        return $this->successResponse([
            'role' => [
                'id' => $role->id,
                'name' => [
                    'en' => $role->getTrans('trans_names', 'en'),
                    'ru' => $role->getTrans('trans_names', 'ru'),
                ],
                'value' => $role->name,
                'permissions' => MainPermissionResource::collection($role->permissions),
            ],
        ]);
    }
}
