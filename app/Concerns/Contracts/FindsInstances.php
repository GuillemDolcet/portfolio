<?php

namespace App\Concerns\Contracts;

interface FindsInstances
{
    /**
     * Finds a model instance by key.
     *
     * @param  mixed $id
     * @param  array $options
     * @return mixed
     */
    public function find($id, array $options = []);

    /**
     * Finds a model instance by key.
     *
     * @param  array $keys
     * @param  array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $keys, array $options = []);

    /**
     * Finds a model instance by the supplied attributes.
     *
     * @param  array $attributes
     * @param  array $options
     * @return mixed
     */
    public function findBy(array $attributes, array $options = []);

    /**
     * Get all model instances by the supplied attributes.
     *
     * @param  array $attributes
     * @param  array $options
     * @return mixed
     */
    public function allBy(array $attributes, array $options = []);

    /**
     * Finds a model instance by key via the supplied context.
     *
     * @param  \Illuminate\Database\Eloquent\Builder    $ctx
     * @param  mixed                                    $id
     * @param  array                                    $options
     * @return mixed|null
     */
    public function findViaContext($ctx, $id, array $options = []);

    /**
     * Finds a model instance by the supplied attributes via the supplied context.
     *
     * @param  array $attributes
     * @param  array $options
     * @return mixed
     */
    public function findByViaContext($ctx, array $attributes, array $options = []);

    /**
     * Finds a model instance by key via the supplied context.
     *
     * @param  \Illuminate\Database\Eloquent\Builder     $ctx
     * @param  array                                    $keys
     * @param  array                                    $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findManyViaContext($ctx, array $keys, array $options = []);
}
