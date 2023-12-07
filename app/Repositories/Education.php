<?php

namespace App\Repositories;

use App\Models\Education as EducationModel;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Education extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return EducationModel::class;
    }

    /**
     * *All* education query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* education from the database.
     *
     * @param array $options
     * @return Collection<int,EducationModel>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new EducationModel object.
     *
     * @param  array $attributes
     * @return EducationModel
     */
    public function build(array $attributes = []): EducationModel
    {
        return $this->make($attributes);
    }

    /**
     * Creates a EducationModel instance.
     *
     * @param array $attributes
     * @param User $user
     * @return EducationModel|null
     */
    public function create(array $attributes, User $user): ?EducationModel
    {
        return $this->update($this->build(), $attributes, $user);
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
     * Updates a EducationModel instance.
     *
     * @param EducationModel $instance
     * @param array $attributes
     * @param User $user
     * @return EducationModel|null
     */
    public function update(EducationModel $instance, array $attributes, User $user): ?EducationModel
    {
        $instance->fill($attributes);

        $instance->user()->associate($user);

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
