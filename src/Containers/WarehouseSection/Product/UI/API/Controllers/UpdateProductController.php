<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\UpdateProductAction;
use App\Containers\WarehouseSection\Product\UI\API\Requests\UpdateProductRequest;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainProductResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateProductController extends ApiController
{
    public function __invoke(UpdateProductRequest $request): JsonResponse
    {
        $product = UpdateProductAction::run($request->id, [
            'name' => $request->name,
            'description' => $request->description,
            'property_values' => $request->property_values,
            'images' => $request->images,
        ]);

        return $this->successResponse([
            'product' => new MainProductResource($product),
        ]);
    }
}
