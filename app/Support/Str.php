<?php

namespace App\Support;

use Illuminate\Support\Str as LaravelStr;

class Str extends LaravelStr
{
    /**
     * Returns a new string with the given record separator removed from the end
     * of str (if present).
     * If `$separator` has not been changed from the default, then `str_chomp` also
     * removes carriage return characters (that is it will remove \n, \r, and \r\n).
     *
     * @param string  $input
     * @param mixed|null $separator
     * @return  string
     */
    public static function chomp(string $input, mixed $separator = null): string
    {
        if (empty($input)) {
            return $input;
        }

        $sep = preg_quote($separator ?: "\n\r");

        return preg_replace('/[' . $sep . ']+$/', '', $input);
    }

    /**
     * "Normalizes" the supplied string and uppercase's it.
     *
     * @param string $input
     * @param string $default
     * @return string
     */
    public static function normalize(string $input, string $default = ''): string
    {
        $normalized = static::slug($input) != '' ? $input : $default;

        // Trim & collapse whitespace
        $normalized = mb_ereg_replace('^[[:space:]]+|[[:space:]]+\$', '', $normalized, 'msr');
        $normalized = mb_ereg_replace('[[:space:]]+', ' ', $normalized, 'msr');

        return mb_strtoupper($normalized);
    }

    /**
     * Breaks the supplied string into lines and cleans trailing space and carriage returns
     *
     * @param string $input
     * @param string $separator
     * @return array
     */
    public static function breakIntoLines(string $input, string $separator = "\n"): array
    {
        return array_filter(array_map(fn ($l) => trim(static::chomp($l)), explode($separator, $input)), 'strlen');
    }

    /**
     * Returns a new string with accents removed.
     *
     * @param string $input
     * @return  string
     */
    public static function unaccent(string $input): string
    {
        $search = [];
        $replace = [];
        $translations = get_html_translation_table(HTML_ENTITIES, ENT_COMPAT | ENT_HTML5);

        foreach ($translations as $k => $v) {
            if (ord($k) >= 192) {
                $search[] = $k;
                $replace[] = $v[1];
            }
        }

        return str_replace($search, $replace, $input);
    }

    /**
     * Generic string value cast function.
     *
     * @param mixed $value
     * @return string
     */
    public static function cast(mixed $value): string
    {
        return trim((string) $value);
    }

    /**
     * Generic string value cast function w/null propagation.
     *
     * @param mixed $value
     * @return null|string
     */
    public static function castOrNull(mixed $value): ?string
    {
        $conv = static::cast($value);

        return ($conv === '' || $conv === '-') ? null : $conv;
    }

    /**
     * Money value cast function (suitable for DB insertion).
     *
     * @param mixed $value
     * @return string
     */
    public static function castAsMoney(mixed $value): string
    {
        $conv = static::cast($value);

        if ($conv === '') {
            return '0.00';
        }

        $dot = strpos($conv, '.');
        $comma = strpos($conv, ',');

        if ($dot !== false && $comma !== false) {
            return str_replace(',', '.', str_replace('.', '', $conv));
        }

        if ($dot === false && $comma !== false) {
            return str_replace(',', '.', $conv);
        }

        return $conv;
    }

    /**
     * Generic int cast function.
     *
     * @param mixed $value
     * @return int
     */
    public static function toInt(mixed $value): int
    {
        return (int) static::cast($value);
    }

    /**
     * Generic float cast function.
     *
     * @param mixed $value
     * @return float
     */
    public static function toFloat(mixed $value): float
    {
        return (float) static::castAsMoney($value);
    }
}
