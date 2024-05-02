<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\CreateProductAction;
use App\Containers\WarehouseSection\Product\UI\API\Requests\CreateProductRequest;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainProductResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateProductController extends ApiController
{
    public function __invoke(CreateProductRequest $request): JsonResponse
    {
        $product = CreateProductAction::run($request->toArray());

        return $this->successResponse([
            'product' => new MainProductResource($product),
        ]);
    }
}
