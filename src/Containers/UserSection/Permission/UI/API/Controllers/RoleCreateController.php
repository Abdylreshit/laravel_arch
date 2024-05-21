<?php

namespace App\Containers\UserSection\Permission\UI\API\Controllers;

use App\Containers\UserSection\Permission\Actions\RoleCreateAction;
use App\Containers\UserSection\Permission\UI\API\Requests\RoleCreateRequest;
use App\Containers\UserSection\Permission\UI\API\Resources\MainRoleResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class RoleCreateController extends ApiController
{
    public function __invoke(RoleCreateRequest $request)
    {
        $role = RoleCreateAction::run([
            'name' => [
                'ru' => $request->name['ru'],
                'en' => $request->name['en'],
            ],

        ], $request->permissions ?? []);

        return $this->successResponse([
            'role' => new MainRoleResource($role),
        ]);
    }
}
