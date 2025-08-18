<?php

namespace App\Support;

use Illuminate\Support\Arr as LaravelArr;

class Arr extends LaravelArr
{
    /**
     * Returns a copy of the supplied array with all (null) elements removed.
     *
     * @param array $ary
     * @return array
     */
    public static function compact(array $ary): array
    {
        return array_filter($ary, fn ($el) => !empty($el));
    }

    /**
     * Get all the given array except for a specified array of keys.
     *
     * @param array $ary
     * @param string $key
     * @param string|null $value
     * @return array
     */
    public static function without(array $ary, string $key, ?string $value = null): array
    {
        if (!array_key_exists($key, $ary)) {
            return $ary;
        }

        if (is_null($value)) {
            return static::except($ary, $key);
        }

        $position = array_search($value, $ary[$key]);

        if ($position === false) {
            return $ary;
        }

        unset($ary[$key][$position]);

        return $ary;
    }
}
