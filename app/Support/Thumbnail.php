<?php

namespace App\Support;

use App\Concerns\Contracts\Thumbnailable;

class Thumbnail
{
    /**
     * Get the thumbnail host.
     *
     * @return string
     */
    public static function host(): string
    {
        return config('services.thumbnail_host', 'thumbs');
    }

    /**
     * Return a thumbnail url.
     *
     * @param Thumbnailable|string $to
     * @param array $options
     * @return string
     */
    public static function url(Thumbnailable|string $to, array $options = []): string
    {
        if (is_string($to)) {
            return static::urlTo($to, $options);
        }

        $prefix = isset($options['prefix']) ? (string) $options['prefix'] : $to->getThumbnailPrefix();

        $key = isset($options['key']) ? (string) $options['key'] : $to->getThumbnailKey();

        return static::urlTo("{$prefix}/{$key}", $options);
    }

    /**
     * Return a thumbnail url for the given path.
     *
     * @param string $path
     * @param array $options
     * @return string
     */
    public static function urlTo(string $path, array $options = []): string
    {
        $secure = !isset($options['secure']) || !!$options['secure'];

        return ($secure ? 'https' : 'http') . '://' . static::host() . (str_starts_with($path, '/') ? $path : '/' . $path);
    }
}
