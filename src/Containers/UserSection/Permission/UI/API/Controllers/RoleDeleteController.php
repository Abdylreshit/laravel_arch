<?php

namespace App\Containers\UserSection\Permission\UI\API\Controllers;

use App\Containers\UserSection\Permission\Actions\RoleDeleteAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class RoleDeleteController extends ApiController
{
    public function __invoke(Request $request)
    {
        RoleDeleteAction::run($request->id);

        return $this->noContent();
    }
}
