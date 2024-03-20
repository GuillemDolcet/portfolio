<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Support\Arr;
use App\Support\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Testimonials extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Testimonial::class;
    }

    /**
     * *All* testimonials query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* testimonials from the database.
     *
     * @param array $options
     * @return Collection<int,Testimonial>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Testimonial object.
     *
     * @param  array $attributes
     * @return Testimonial
     */
    public function build(array $attributes = []): Testimonial
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Testimonial instance.
     *
     * @param array $attributes
     * @return Testimonial|null
     */
    public function create(array $attributes): ?Testimonial
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
     * Updates a Testimonial instance.
     *
     * @param Testimonial $instance
     * @param array $attributes
     * @return Testimonial|null
     */
    public function update(Testimonial $instance, array $attributes): ?Testimonial
    {
        $instance->fill(Arr::except($attributes, ['image']));

        if (isset($attributes['image'])){
            if ($instance->exists && !is_null($instance->image)){
                Storage::disk('public')->delete($instance->image);
            }

            $path = Storage::disk('public')->putFile('testimonials', $attributes['image']);
            $instance->image = $path;
        }

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a Testimonial instance.
     *
     * @param Testimonial $instance
     * @return void
     */
    public function delete(Testimonial $instance): void
    {
        Storage::disk('public')->delete($instance->image);

        $instance->delete();
    }
}
