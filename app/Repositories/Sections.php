<?php

namespace App\Repositories;

use App\Models\Section;
use App\Models\Skill;
use App\Support\Arr;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Sections extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Section::class;
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
     * Get *all* sections from the database.
     *
     * @param array $options
     * @return Collection<int,Skill>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Section object.
     *
     * @param  array $attributes
     * @return Section
     */
    public function build(array $attributes = []): Section
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Section instance.
     *
     * @param array $attributes
     * @return Section|null
     */
    public function create(array $attributes): ?Section
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
     * Updates a section instance.
     *
     * @param Section $instance
     * @param array $attributes
     * @return Section|null
     */
    public function update(Section $instance, array $attributes): ?Section
    {
        $instance->fill(Arr::except($attributes, ['image']));

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }
}
