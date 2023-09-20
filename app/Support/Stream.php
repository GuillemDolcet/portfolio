<?php

namespace App\Support;

use Closure;
use Throwable;

class Stream
{
    /**
     * Block size in bytes.
     *
     * @var int
     */
    public const BLOCK_SIZE = 65536;

    /**
     * Executes the give block with the supplied stream resource. Gracefully
     * closing it afterward.
     *
     * @param string $filename
     * @param string $mode
     * @param  Closure $block
     * @return mixed
     */
    public static function open(string $filename, string $mode, Closure $block): mixed
    {
        $fh = fopen($filename, $mode);

        if ($fh === false) {
            return false;
        }

        try {
            $result = $block($fh);

            fclose($fh);

            return $result;
        } catch (Throwable $th) {
            fclose($fh);

            throw $th;
        }
    }

    /**
     * Executes the give block with the supplied stream resource. Gracefully
     * closing it afterward.
     *
     * @param string $filename
     * @param string $mode
     * @param  Closure $block
     * @return mixed
     */
    public static function gzopen(string $filename, string $mode, Closure $block): mixed
    {
        $fh = gzopen($filename, $mode);

        if ($fh === false) {
            return false;
        }

        try {
            $result = $block($fh);

            gzclose($fh);

            return $result;
        } catch (Throwable $th) {
            gzclose($fh);

            throw $th;
        }
    }

    /**
     * Downloads contents from supplied url into the given file path.
     *
     * @param string $url
     * @param string $path
     * @param array $options
     * @return int|false
     * @throws Throwable
     */
    public static function download(string $url, string $path, array $options = []): int|false
    {
        $options = array_merge(['force_utf8' => false], $options);

        return Stream::open($url, 'rb', function ($sh) use ($path, $options) {
            return Stream::open($path, 'wb', function ($dh) use ($sh, $options) {
                $bytes = 0;

                if (isset($options['force_utf8']) && !!$options['force_utf8']) {
                    stream_filter_append($dh, 'convert.iconv.Cp1252/UTF-8//IGNORE', STREAM_FILTER_WRITE);
                }

                while (!feof($sh)) {
                    $buff = fread($sh, static::BLOCK_SIZE);

                    if ($buff === false) {
                        return false;
                    }

                    $written = fwrite($dh, $buff);

                    if ($written === false) {
                        return false;
                    }

                    $bytes = $bytes + $written;
                }

                return $bytes;
            });
        });
    }

    /**
     * Executes the supplied closure w/ a new temporally file as an argument.
     *
     * @param Closure $block
     * @param string $prefix
     * @param string $path
     * @return mixed
     * @throws Throwable
     */
    public static function withTempFile(Closure $block, string $prefix = '', string $path = ''): mixed
    {
        $tmp = @tempnam(storage_path($path), $prefix);

        $result = $block($tmp);

        @unlink($tmp);

        return $result;
    }

    /**
     * Uncompressed the supplied input file into the given output.
     *
     * @param string $from file
     * @param null|string $to file
     * @return int|false
     * @throws Throwable
     */
    public static function gzuncompress(string $from, ?string $to = null): int|false
    {
        return Stream::open($to ?? str_replace('.gz', '', $from), 'wb', function ($fh) use ($from) {
            return Stream::gzopen($from, 'rb', function ($zh) use ($fh) {
                $bytes = 0;

                while (!gzeof($zh)) {
                    $buff = gzread($zh, static::BLOCK_SIZE);

                    $written = fwrite($fh, $buff);

                    if ($written === false) {
                        return false;
                    }

                    $bytes = $bytes + $written;
                }

                return $bytes;
            });
        });
    }
}
