<?php

namespace App\Repositories;

use App\Models\Experience;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Experiences extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Experience::class;
    }

    /**
     * *All* experiences query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* experiences from the database.
     *
     * @param array $options
     * @return Collection<int,Experience>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Experience object.
     *
     * @param  array $attributes
     * @return Experience
     */
    public function build(array $attributes = []): Experience
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Experience instance.
     *
     * @param array $attributes
     * @return Experience|null
     */
    public function create(array $attributes): ?Experience
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
     * Updates a Experience instance.
     *
     * @param Experience $instance
     * @param array $attributes
     * @return Experience|null
     */
    public function update(Experience $instance, array $attributes): ?Experience
    {
        $instance->fill($attributes);

        $result = $instance->save();

        $instance->skills()->detach();

        if (isset($attributes['skills'])){
            $instance->skills()->attach($attributes['skills']);
        }

        if (! $result) {
            return null;
        }

        return $instance;
    }
}
