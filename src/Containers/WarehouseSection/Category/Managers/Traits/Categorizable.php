<?php

namespace App\Containers\WarehouseSection\Category\Managers\Traits;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Models\Model;
use ArrayAccess;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as BaseCollection;

trait Categorizable
{
    /**
     * Register a saved model event with the dispatcher.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    abstract public static function saved($callback);

    /**
     * Register a deleted model event with the dispatcher.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    abstract public static function deleted($callback);

    /**
     * Get all attached categories to the model.
     */
    public function categories(): MorphToMany
    {
        return $this->morphToMany(
            Category::class,
            'categorizable',
            'categorizables',
            'categorizable_id',
            'category_id'
        )
            ->withTimestamps();
    }

    /**
     * Attach the given category(ies) to the model.
     *
     * @param  int|string|array|ArrayAccess|Category  $categories
     */
    public function setCategoriesAttribute($categories): void
    {
        static::saved(function (self $model) use ($categories) {
            $model->syncCategories($categories);
        });
    }

    /**
     * Boot the categorizable trait for the model.
     *
     * @return void
     */
    public static function bootCategorizable()
    {
        static::deleted(function (self $model) {
            // Check if this is a soft delete or not by checking if `SoftDeletes::isForceDeleting` method exists
            (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) || $model->categories()->detach();
        });
    }

    /**
     * Scope query with all the given categories.
     *
     * @param  mixed  $categories
     */
    public function scopeWithAllCategories(Builder $builder, $categories): Builder
    {
        $categories = $this->prepareCategoryIds($categories);

        collect($categories)->each(function ($category) use ($builder) {
            $builder->whereHas('categories', function (Builder $builder) use ($category) {
                return $builder->where('id', $category);
            });
        });

        return $builder;
    }

    /**
     * Scope query with any of the given categories.
     *
     * @param  mixed  $categories
     */
    public function scopeWithAnyCategories(Builder $builder, $categories): Builder
    {
        $categories = $this->prepareCategoryIds($categories);

        return $builder->whereHas('categories', function (Builder $builder) use ($categories) {
            $builder->whereIn('id', $categories);
        });
    }

    /**
     * Scope query with any of the given categories.
     *
     * @param  mixed  $categories
     */
    public function scopeWithCategories(Builder $builder, $categories): Builder
    {
        return static::scopeWithAnyCategories($builder, $categories);
    }

    /**
     * Scope query without any of the given categories.
     *
     * @param  mixed  $categories
     */
    public function scopeWithoutCategories(Builder $builder, $categories): Builder
    {
        $categories = $this->prepareCategoryIds($categories);

        return $builder->whereDoesntHave('categories', function (Builder $builder) use ($categories) {
            $builder->whereIn('id', $categories);
        });
    }

    /**
     * Scope query without any categories.
     */
    public function scopeWithoutAnyCategories(Builder $builder): Builder
    {
        return $builder->doesntHave('categories');
    }

    /**
     * Determine if the model has any of the given categories.
     *
     * @param  mixed  $categories
     */
    public function hasCategories($categories): bool
    {
        $categories = $this->prepareCategoryIds($categories);

        return ! $this->categories->pluck('id')->intersect($categories)->isEmpty();
    }

    /**
     * Determine if the model has any the given categories.
     *
     * @param  mixed  $categories
     */
    public function hasAnyCategories($categories): bool
    {
        return static::hasCategories($categories);
    }

    /**
     * Determine if the model has all of the given categories.
     *
     * @param  mixed  $categories
     */
    public function hasAllCategories($categories): bool
    {
        $categories = $this->prepareCategoryIds($categories);

        return collect($categories)->diff($this->categories->pluck('id'))->isEmpty();
    }

    /**
     * Sync model categories.
     *
     * @param  mixed  $categories
     * @return $this
     */
    public function syncCategories($categories, bool $detaching = true)
    {
        // Find categories
        $categories = $this->prepareCategoryIds($categories);

        // Sync model categories
        $this->categories()->sync($categories, $detaching);

        return $this;
    }

    /**
     * Attach model categories.
     *
     * @param  mixed  $categories
     * @return $this
     */
    public function attachCategories($categories)
    {
        return $this->syncCategories($categories, false);
    }

    /**
     * Detach model categories.
     *
     * @param  mixed  $categories
     * @return $this
     */
    public function detachCategories($categories = null)
    {
        $categories = ! is_null($categories) ? $this->prepareCategoryIds($categories) : null;

        // Sync model categories
        $this->categories()->detach($categories);

        return $this;
    }

    /**
     * Prepare category IDs.
     *
     * @param  mixed  $categories
     */
    protected function prepareCategoryIds($categories): array
    {
        // Convert collection to plain array
        if ($categories instanceof BaseCollection && is_string($categories->first())) {
            $categories = $categories->toArray();
        }

        // Find categories by their ids
        if (is_numeric($categories) || (is_array($categories) && is_numeric(Arr::first($categories)))) {
            return array_map('intval', (array) $categories);
        }

        // Find categories by their slugs
        if (is_string($categories) || (is_array($categories) && is_string(Arr::first($categories)))) {
            $categories = Category::query()->whereIn('slug', (array) $categories)->get()->pluck('id');
        }

        if ($categories instanceof Model) {
            return [$categories->getKey()];
        }

        if ($categories instanceof Collection) {
            return $categories->modelKeys();
        }

        if ($categories instanceof BaseCollection) {
            return $categories->toArray();
        }

        return (array) $categories;
    }
}
