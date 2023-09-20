<?php

namespace App\Concerns\Contracts;

interface Thumbnailable
{
    /**
     * Get the value of the model's image key.
     *
     * @return string
     */
    public function getThumbnailKey(): string;

    /**
     * Get the value of the model's image prefix (if needed).
     *
     * @return string
     */
    public function getThumbnailPrefix(): string;
}
