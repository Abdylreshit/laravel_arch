<?php

namespace App\Containers\UserSection\Permission\UI\API\Controllers;

use App\Containers\UserSection\Permission\Actions\PermissionListAction;
use App\Containers\UserSection\Permission\UI\API\Resources\MainPermissionResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class PermissionListController extends ApiController
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

        $permissions = PermissionListAction::run($request->only('search', 'sort'));

        return $this->successResponse([
            'permissions' => MainPermissionResource::collection($permissions),
        ]);
    }
}
