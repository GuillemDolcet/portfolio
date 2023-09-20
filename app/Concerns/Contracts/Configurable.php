<?php

namespace App\Concerns\Contracts;

interface Configurable
{
    /**
     * Returns configuration options.
     *
     * @return array
     */
    public function getConfig(): array;

    /**
     * Returns a configuration option.
     *
     * @param string $name
     * @return mixed
     */
    public function getConfigOption(string $name): mixed;
}
