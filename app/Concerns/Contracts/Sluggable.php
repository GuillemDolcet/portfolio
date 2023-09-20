<?php

namespace App\Concerns\Contracts;

interface Sluggable
{
    /**
     * Find the current model by the "slug" attribute.
     *
     * @param string $slug
     * @return \App\Concerns\Contracts\Sluggable
     */
    public static function findBySlug($slug);

    /**
     * Returns the "slug" field for the current model.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Generate a *unique* "slug" for the current model.
     *
     * @return string
     */
    public function generateSlug();

    /**
     * Ensures the "slug" field is not empty.
     *
     * @return void
     */
    public function ensureSlug();

    /**
     * "Resets" the "slug" field to a newly computed value.
     *
     * @return void
     */
    public function resetSlug();

    /**
     * Returns the slug source column name. Can be overriden per model.
     *
     * @return string
     */
    public function getSlugSourceColumn();

    /**
     * Returns the "qualified" slug source column name. Can be overriden pr model.
     *
     * @return string
     */
    public function getQualifiedSlugSourceColumn();

    /**
     * Returns the slug source string. Can be overriden per model.
     *
     * @return string
     */
    public function getSlugSource();

    /**
     * Get the default "slug" separator character (-).
     *
     * @return string
     */
    public function getSlugSeparator();

    /**
     * Get the name of the "slug" column.
     *
     * @return string
     */
    public function getSlugColumn();

    /**
     * Get the fully qualified "slug" column.
     *
     * @return string
     */
    public function getQualifiedSlugColumn();
}
