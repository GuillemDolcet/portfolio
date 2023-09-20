<?php

namespace App\Concerns;

use Closure;

trait MemoizesAttributes
{
    /**
     * The memoized attributes.
     *
     * @var array
     */
    protected array $memoized = [];

    /**
     * Return the memoized attributes array.
     *
     * @return array
     */
    public function getMemoizedAttributes(): array
    {
        return $this->memoized;
    }

    /**
     * Checks if the supplied value has been memoized already.
     *
     * @param string $name
     * @return boolean
     */
    public function isMemoized(string $name): bool
    {
        return array_key_exists($name, $this->memoized);
    }

    /**
     * Returns the memoized attribute or resolves it by calling the supplied resolver closure.
     *
     * @param string $name
     * @param \Closure $resolver
     * @return mixed
     */
    public function memoize(string $name, Closure $resolver): mixed
    {
        if (!$this->isMemoized($name)) {
            $this->memoized[$name] = $resolver();
        }

        return $this->memoized[$name];
    }
}
