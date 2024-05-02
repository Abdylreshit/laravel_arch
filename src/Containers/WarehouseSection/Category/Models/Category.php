<?php

namespace App\Containers\WarehouseSection\Category\Models;

use App\Containers\WarehouseSection\Category\CustomCollection;
use App\Containers\WarehouseSection\Category\Data\Factories\CategoryFactory;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\SlugTrait;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use App\Ship\Core\Abstracts\Models\Traits\WithMediaTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NestedSet;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use NodeTrait;
    use SlugTrait;
    use SoftDeletes;
    use TranslateTrait;
    use WithMediaTrait;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'priority',
        NestedSet::LFT,
        NestedSet::RGT,
        NestedSet::PARENT_ID,
    ];

    protected array $translatable = [
        'name',
        'description',
    ];

    protected string $genSlugField = 'name';

    protected static function newFactory(): Factory
    {
        return CategoryFactory::new();
    }

    public function newCollection(array $models = []): CustomCollection
    {
        return new CustomCollection($models);
    }

    public function entries(string $class): MorphToMany
    {
        return $this->morphedByMany($class,
            'categorizable',
            'categorizables',
            'category_id',
            'categorizable_id',
            'id',
            'id'
        );
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        if (config('category.image')) {
            $this->addMediaConversion('thumb')
                ->width(800)
                ->height(200)
                ->format('webp');
        }
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
}
