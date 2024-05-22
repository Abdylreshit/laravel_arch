<?php

namespace App\Containers\UserSection\Permission\UI\API\Controllers;

use App\Containers\UserSection\Permission\Actions\RoleUpdateAction;
use App\Containers\UserSection\Permission\UI\API\Requests\RoleUpdateRequest;
use App\Containers\UserSection\Permission\UI\API\Resources\MainRoleResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class RoleUpdateController extends ApiController
{
    public function __invoke(RoleUpdateRequest $request)
    {
        $role = RoleUpdateAction::run(
            $request->id,
            [
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
