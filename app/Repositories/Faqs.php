<?php

namespace App\Repositories;

use App\Models\Faq;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Faqs extends Repository
{
    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return Faq::class;
    }

    /**
     * *All* faqs query context.
     *
     * @param array $options
     * @return Builder
     */
    public function allContext(array $options = []): Builder
    {
        return $this->applyBuilderOptions($this->newQuery(), $options)->orderBy('id');
    }

    /**
     * Get *all* faqs from the database.
     *
     * @param array $options
     * @return Collection<int,Faq>
     */
    public function all(array $options = []): Collection
    {
        return $this->allContext($options)->get();
    }

    /**
     * Instantiates a new Faq object.
     *
     * @param  array $attributes
     * @return Faq
     */
    public function build(array $attributes = []): Faq
    {
        return $this->make($attributes);
    }

    /**
     * Creates a Faq instance.
     *
     * @param array $attributes
     * @return Faq|null
     */
    public function create(array $attributes): ?Faq
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
     * Updates a Faq instance.
     *
     * @param Faq $instance
     * @param array $attributes
     * @return Faq|null
     */
    public function update(Faq $instance, array $attributes): ?Faq
    {
        $instance->fill($attributes);

        $result = $instance->save();

        if (! $result) {
            return null;
        }

        return $instance;
    }

    /**
     * Delete a Faq instance.
     *
     * @param Faq $instance
     * @return void
     */
    public function delete(Faq $instance): void
    {
        $instance->delete();
    }
}
