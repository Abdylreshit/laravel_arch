<?php

namespace App\Containers\UserSection\Staff\UI\API\Controllers;

use App\Containers\UserSection\Staff\Actions\StaffListAction;
use App\Containers\UserSection\Staff\UI\API\Resources\ListStaffResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class StaffListController extends ApiController
{
    /**
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,firstname,lastname,email,phone,created_at
     * @LRDparam limit nullable|integer
     * @LRDparam page nullable|integer
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,firstname,lastname,email,phone,created_at',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $staff = StaffListAction::run($request->only('search', 'sort', 'limit', 'page'));

        return $this->successResponse([
            'staff' => new ListStaffResource($staff),
        ]);
    }
}
