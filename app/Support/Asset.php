<?php

namespace App\Support;

use Illuminate\Support\Facades\Vite;

class Asset
{
    /**
     * Returns the path to an asset (can be versioned if a mix-manifest.json file exists).
     *
     * @param string $path
     * @param string $base
     * @param string $buildDirectory
     * @return string
     */
    public static function path(string $path, string $base = 'resources/assets', string $buildDirectory = 'assets'): string
    {
        return Vite::asset($base . $path, $buildDirectory);
    }

    /**
     * Return the path to a javascript asset (or versioned one if exists).
     *
     * @param  string  $path
     * @return string
     */
    public static function javascriptPath(string $path): string
    {
        return static::path('/javascripts/' . $path);
    }

    /**
     * Return the path to a stylesheet asset (or versioned one if exists).
     *
     * @param  string  $path
     * @return string
     */
    public static function stylesheetPath(string $path): string
    {
        return static::path('/stylesheets/' . $path);
    }

    /**
     * Return the path to an image asset (or versioned one if exists).
     *
     * @param string $path
     * @return string
     */
    public static function imagePath(string $path): string
    {
        return static::path('/images/' . $path);
    }

    /**
     * Return the path to a font asset (or versioned one if exists).
     *
     * @param string $path
     * @return string
     */
    public static function fontPath(string $path): string
    {
        return static::path('/fonts/' . $path);
    }

    /**
     * Returns the path to an asset (can be versioned if a mix-manifest.json file exists).
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    public static function url(string $path, ?bool $secure = null): string
    {
        return asset(static::path($path), $secure);
    }

    /**
     * Return the path to a javascript asset (or versioned one if exists).
     *
     * @param  string  $path
     * @param bool|null $secure
     * @return string
     */
    public static function javascriptUrl(string $path, ?bool $secure = null): string
    {
        return asset(static::javascriptPath($path), $secure);
    }

    /**
     * Return the path to a stylesheet asset (or versioned one if exists).
     *
     * @param  string  $path
     * @param bool|null $secure
     * @return string
     */
    public static function stylesheetUrl(string $path, ?bool $secure = null): string
    {
        return asset(static::stylesheetPath($path), $secure);
    }

    /**
     * Return the path to an image asset (or versioned one if exists).
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    public static function imageUrl(string $path, ?bool $secure = null): string
    {
        return asset(static::imagePath($path), $secure);
    }

    /**
     * Return the path to a font asset (or versioned one if exists).
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    public static function fontUrl(string $path, ?bool $secure = null): string
    {
        return asset(static::fontPath($path), $secure);
    }
}
