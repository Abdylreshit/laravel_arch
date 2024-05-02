<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\CreateProductTask;
use App\Ship\Core\Abstracts\Actions\Action;
use App\Ship\Exceptions\ResourceException;

class CreateProductAction extends Action
{
    public function handle(array $data)
    {
        try {
            $product = app(CreateProductTask::class)->execute([
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
                $product->propertyValues()->attach($data['property_values']);
            }

            if (array_key_exists('images', $data)) {
                $product->addMultipleMediaFromRequest(['images'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('images');
                    });
            }
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $product;
    }
}
