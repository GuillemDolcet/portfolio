<?php

namespace App\Support;

use Throwable;

class Csv
{
    /**
     * Parses the given CSV data string (multi-line) into an array.
     *
     * @param string $csv
     * @param string $separator
     * @param bool $headers
     * @return array
     */
    public static function parse(string $csv, string $separator = "\t", bool $headers = false): array
    {
        $lines = Arr::compact(array_map(fn ($l) => Str::chomp($l), str_getcsv($csv, PHP_EOL)));

        $pf = function ($fields) use ($separator) {
            return str_getcsv($fields, $separator);
        };

        if ($headers) {
            $header = array_map(fn ($s) => trim($s), str_getcsv($lines[0], $separator));

            array_shift($lines);

            $pf = function ($fields) use ($separator, $header) {
                return array_combine($header, str_getcsv($fields, $separator));
            };
        }

        return array_values(array_map($pf, $lines));
    }

    /**
     * Loads the supplied CSV file-path (or url) data into an array.
     *
     * @param string $path
     * @param string $separator
     * @param bool $headers
     * @return array
     * @throws Throwable
     */
    public static function load(string $path, string $separator = "\t", bool $headers = false): array
    {
        $data = Stream::open($path, 'rb', function ($stream) use ($separator) {
            $lines = [];

            while (!feof($stream) && ($line = fgetcsv($stream, 8192, $separator)) !== false) {
                $lines[] = $line;
            }

            return $lines;
        });

        if ($headers) {
            $header = array_shift($data);

            $data = array_map(function ($row) use ($header) {
                return array_combine($header, $row);
            }, $data);
        }

        return array_values($data);
    }
}
