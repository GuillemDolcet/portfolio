<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage as StorageArr;

class Storage extends StorageArr
{
    /**
     * Generates a random unique file name and return the final path
     *
     * @param string $path
     * @param string $ext
     * @param string $disk
     * @return string
     */
    public static function randomFileName(string $path, string $ext, string $disk = 'public'): string
    {
        $random = Str::random(10);

        while(static::disk($disk)->exists($path.$random.'.'.$ext)){
            $random = Str::random(10);
        }

        return $path.$random.'.'.$ext;
    }
}
