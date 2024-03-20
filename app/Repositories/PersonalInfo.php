<?php

namespace App\Repositories;

use App\Support\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\PersonalInfo as PersonalInfoModel;

class PersonalInfo extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return PersonalInfoModel::class;
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
     * Get *all* personalInfo from the database.
     *
     * @param array $options
     * @return Collection<int,PersonalInfoModel>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new PersonalInfoModel object.
     *
     * @param  array $attributes
     * @return PersonalInfoModel
     */
    public function build(array $attributes = []): PersonalInfoModel
    {
        return $this->make($attributes);
    }

    /**
     * Creates a PersonalInfoModel instance.
     *
     * @param array $attributes
     * @return PersonalInfoModel|null
     */
    public function create(array $attributes): ?PersonalInfoModel
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
     * Updates a PersonalInfoModel instance.
     *
     * @param PersonalInfoModel $instance
     * @param array $attributes
     * @return PersonalInfoModel|null
     */
    public function update(PersonalInfoModel $instance, array $attributes): ?PersonalInfoModel
    {
        $instance->fill($attributes);

        if (isset($attributes['image'])){
            if ($instance->exists){
                Storage::disk('public')->delete($instance->image);
            }

            $path = Storage::disk('public')->putFile('personalInfo', $attributes['image']);
            $instance->image = $path;
        }

        if (isset($attributes['cv'])){
            if ($instance->exists){
                Storage::disk('public')->delete($instance->cv);
            }

            $path = Storage::disk('public')->putFile('personalInfo', $attributes['cv']);
            $instance->cv = $path;
        }

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a personalInfo instance.
     *
     * @param PersonalInfoModel $instance
     * @return void
     */
    public function delete(PersonalInfoModel $instance): void
    {
        Storage::disk('public')->delete($instance->image);

        Storage::disk('public')->delete($instance->cv);

        $instance->delete();
    }
}
