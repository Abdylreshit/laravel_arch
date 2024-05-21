<?php

namespace App\Containers\UserSection\Permission\UI\API\Controllers;

use App\Containers\UserSection\Permission\Actions\RoleListAction;
use App\Containers\UserSection\Permission\UI\API\Resources\MainRoleResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class RoleListController extends ApiController
{
    /**
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,name
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,name',
        ]);

        $roles = RoleListAction::run($request->only('search', 'sort'));

        return $this->successResponse([
            'roles' => MainRoleResource::collection($roles),
        ]);
    }
}
