<?php

namespace App\Containers\WarehouseSection\Category\Data\Factories;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

class CategoryFactory extends ParentFactory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->name,
                'ru' => $this->faker->name,
            ],
            'description' => [
                'en' => $this->faker->text,
                'ru' => $this->faker->text,
            ],
        ];
    }

        public function configure(): static
        {
            return $this->afterMaking(function (Category $category) {
                $category->slug = Str::slug($category->getTranslation('name', 'en'), '-');
            });
        }
}
