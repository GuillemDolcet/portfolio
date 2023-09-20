<?php

namespace App\Concerns\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\TrackedChange;

interface TracksChanges
{
    /**
     * Get the tracked changes related to this model instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function trackedChanges(): MorphMany;

    /**
     * Get the tracked attributes.
     *
     * @return string[]
     */
    public function getTracked(): array;

    /**
     * Check if the supplied attribute is tracked.
     *
     * @param string $name
     * @return bool
     */
    public function isTracked(string $name): bool;

    /**
     * Check if we should track a change for the supplied attribute name (has changed).
     *
     * @param string $name
     * @return bool
     */
    public function shouldTrackChange(string $name): bool;

    /**
     * Tracks the change of the supplied attribute.
     *
     * @param string $name
     * @return null|\App\Models\TrackedChange
     */
    public function trackChange(string $name): ?TrackedChange;

    /**
     * Track changes to all registered attributes.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function trackChanges(): Collection;
}
