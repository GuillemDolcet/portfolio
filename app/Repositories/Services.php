<?php

namespace App\Repositories;

use App\Models\Service;
use App\Support\Arr;
use App\Support\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Services extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Service::class;
    }

    /**
     * *All* sections query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* services from the database.
     *
     * @param array $options
     * @return Collection<int,Service>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Service object.
     *
     * @param  array $attributes
     * @return Service
     */
    public function build(array $attributes = []): Service
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Service instance.
     *
     * @param array $attributes
     * @return Service|null
     */
    public function create(array $attributes): ?Service
    {
        return $this->update($this->build(), $attributes);
    }

    /**
     * Listing result set.
     *
     * @param Builder $context
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function listing(Builder $context, array $options = []): LengthAwarePaginator
    {
        $options = array_merge(['per_page' => 30], $options);

        return $context->paginate($options['per_page']);
    }

    /**
     * Updates a service instance.
     *
     * @param Service $instance
     * @param array $attributes
     * @return Service|null
     */
    public function update(Service $instance, array $attributes): ?Service
    {
        $instance->fill(Arr::except($attributes, ['image']));

        if (isset($attributes['image'])){
            if ($instance->exists){
                Storage::disk('public')->delete($instance->image);
            }

            $path = Storage::disk('public')->putFile('services', $attributes['image']);
            $instance->image = $path;
        }

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a service instance.
     *
     * @param Service $instance
     * @return void
     */
    public function delete(Service $instance): void
    {
        Storage::disk('public')->delete($instance->image);

        $instance->delete();
    }
}
