<?php

namespace App\Containers\WarehouseSection\EAV\Managers\Traits;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Ship\Core\Abstracts\Models\Model;
use ArrayAccess;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

trait Propertiable
{
    public function propertyValues(): MorphToMany
    {
        return $this->morphToMany(
            PropertyValue::class,
            'entity',
            'entity_property_values',
            'entity_id',
            'property_value_id',
        );
    }

    public function properties()
    {
        return $this->hasManyDeep(
            Property::class,
            ['entity_property_values', PropertyValue::class],
            ['entity_id', null, 'id', 'id'],
            [null,null,'property_value_id','property_id']
        )
            ->where('entity_type', get_class($this))
            ->distinct('properties.id')
            ;
    }

    /**
     * Attach the given property(ies) to the model.
     *
     * @param  int|string|array|ArrayAccess|PropertyValue  $values
     */
    public function setPropertyValuesAttribute($values): void
    {
        static::saved(function (self $model) use ($values) {
            $model->syncPropertyValues($values);
        });
    }

    /**
     * Boot the propertiable trait for the model.
     *
     * @return void
     */
    public static function bootPropertiable()
    {
        static::deleted(function (self $model) {
            // Check if this is a soft delete or not by checking if `SoftDeletes::isForceDeleting` method exists
            (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) || $model->propertyValues()->detach();
        });
    }

    /**
     * Scope query with all the given property values.
     *
     * @param Builder $builder
     * @param mixed $propertyValues
     * @return Builder
     */
    public function scopeWithAllPropertyValues(Builder $builder, mixed $propertyValues): Builder
    {
        $propertyValues = $this->preparePropertyValueIds($propertyValues);

        collect($propertyValues)->each(function ($value) use ($builder) {
            $builder->whereHas('propertyValues', function (Builder $builder) use ($value) {
                return $builder->where('id', $value);
            });
        });

        return $builder;
    }

    /**
     * Scope query with any of the given property values.
     *
     * @param Builder $builder
     * @param $propertyValues
     * @return Builder
     */
    public function scopeWithAnyPropertyValues(Builder $builder, $propertyValues): Builder
    {
        $propertyValues = $this->preparePropertyValueIds($propertyValues);

        return $builder->whereHas('propertyValues', function (Builder $builder) use ($propertyValues) {
            $builder->whereIn('id', $propertyValues);
        });
    }

    /**
     * Scope query with any of the given property values.
     *
     * @param Builder $builder
     * @param mixed $propertyValues
     * @return Builder
     */
    public function scopeWithPropertyValues(Builder $builder, mixed $propertyValues): Builder
    {
        return static::scopeWithAnyPropertyValues($builder, $propertyValues);
    }

    /**
     * Scope query without any of the given property values.
     *
     * @param  mixed  $propertyValues
     */
    public function scopeWithoutPropertyValues(Builder $builder, $propertyValues): Builder
    {
        $propertyValues = $this->preparePropertyValueIds($propertyValues);

        return $builder->whereDoesntHave('propertyValues', function (Builder $builder) use ($propertyValues) {
            $builder->whereIn('id', $propertyValues);
        });
    }

    /**
     * Scope query without any property values.
     */
    public function scopeWithoutAnyPropertyValues(Builder $builder): Builder
    {
        return $builder->doesntHave('propertyValues');
    }

    /**
     * Determine if the model has any of the given property values.
     *
     * @param  mixed  $propertyValues
     */
    public function hasPropertyValues($propertyValues): bool
    {
        $propertyValues = $this->preparePropertyValueIds($propertyValues);

        return ! $this->propertyValues->pluck('id')->intersect($propertyValues)->isEmpty();
    }

    /**
     * Determine if the model has any the given property values.
     *
     * @param  mixed  $properties
     */
    public function hasAnyPropertyValues($properties): bool
    {
        return static::hasPropertyValues($properties);
    }

    /**
     * Determine if the model has all of the given property values.
     *
     * @param  mixed  $properties
     */
    public function hasAllProperties($properties): bool
    {
        $properties = $this->preparePropertyValueIds($properties);

        return collect($properties)->diff($this->propertyValues->pluck('id'))->isEmpty();
    }

    /**
     * Sync model properties.
     *
     * @param mixed $properties
     * @param bool $detaching
     * @return $this
     */
    public function syncPropertyValues(mixed $properties, bool $detaching = true)
    {
        $propertyValues = $this->preparePropertyValueIds($properties);

        $this->propertyValues()->sync($propertyValues, $detaching);

        return $this;
    }

    /**
     * Attach model propertyValues.
     *
     * @param  mixed  $properties
     * @return $this
     */
    public function attachPropertyValues($properties)
    {
        return $this->syncPropertyValues($properties, false);
    }

    /**
     * Detach model properties.
     *
     * @param  mixed  $properties
     * @return $this
     */
    public function detachPropertyValues($properties = null)
    {
        $properties = ! is_null($properties) ? $this->preparePropertyValueIds($properties) : null;

        $this->propertyValues()->detach($properties);

        return $this;
    }

    /**
     * Prepare propertyValue IDs.
     *
     * @param  mixed  $properties
     */
    protected function preparePropertyValueIds($properties): array
    {
        // Convert collection to plain array
        if ($properties instanceof Collection && is_string($properties->first())) {
            $properties = $properties->toArray();
        }

        if (is_numeric($properties) || (is_array($properties) && is_numeric(Arr::first($properties)))) {
            return array_map('intval', (array) $properties);
        }

        if ($properties instanceof Model) {
            return [$properties->getKey()];
        }

        if ($properties instanceof Collection) {
            return $properties->modelKeys();
        }

        return (array) $properties;
    }
}
