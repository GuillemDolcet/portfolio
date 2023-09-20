<?php

namespace App\Concerns\Contracts;

interface Pathable
{
    /**
     * Returns the "path" field for the current model.
     *
     * @return null|string
     */
    public function getPath(): ?string;

    /**
     * "Resets" the "path" field to a newly computed value.
     *
     * @return void
     */
    public function ensurePath(): void;

    /**
     * "Resets" the "path" field to a newly computed value.
     *
     * @return void
     */
    public function resetPath(): void;

    /**
     * Determine if paths should be built automatically.
     *
     * @return bool
     */
    public function autoGeneratePath(): bool;

    /**
     * "Resets" the "path" field to a newly computed value.
     *
     * @return string
     */
    public function buildPath(string $separator = '/'): string;

    /**
     * Get the name of the "path" column.
     *
     * @return string
     */
    public function getPathName(): string;

    /**
     * Get the fully qualified "path" column.
     *
     * @return string
     */
    public function getQualifiedPathName(): string;

    /**
     * Returns the path source column name. Can be overriden per model.
     *
     * @return string
     */
    public function getPathSourceName(): string;

    /**
     * Get the fully qualified path source column name.
     *
     * @return string
     */
    public function getQualifiedPathSourceName(): string;
}
