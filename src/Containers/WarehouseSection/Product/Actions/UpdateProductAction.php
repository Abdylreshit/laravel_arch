<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Containers\WarehouseSection\EAV\Tasks\EditPropertyByIdTask;
use App\Containers\WarehouseSection\Product\Tasks\AttachPropertyValueToProductTask;
use App\Ship\Core\Abstracts\Actions\Action;
use App\Ship\Exceptions\ResourceException;

class UpdateProductAction extends Action
{
    public function handle($id, array $data)
    {
        try {
            $product = app(EditPropertyByIdTask::class)->execute(
                $id,
                [
                    'name' => [
                        'en' => $data['name']['en'],
                        'ru' => $data['name']['ru'],
                    ],
                    'description' => [
                        'en' => $data['description']['en'] ?? null,
                        'ru' => $data['description']['ru'] ?? null,
                    ],
                ]);

            if (array_key_exists('property_values', $data)) {
                PropertyValue::query()
                    ->whereIn('id', $data['property_values'])
                    ->get()
                    ->each(function ($propertyValue) use ($product) {
                        app(AttachPropertyValueToProductTask::class)->execute($product, $propertyValue);
                    });
            }

            if (array_key_exists('images', $data)) {
                $product->addMultipleMediaFromRequest(['images'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('images');
                    });
            }
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $product;
    }
}
