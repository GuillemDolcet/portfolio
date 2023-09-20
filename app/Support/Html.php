<?php

namespace App\Support;

use Exception;
use tidy;

class Html
{
    /**
     * Strips HTML tags and comments.
     *
     * @param string $input
     * @param string|string[]|null $except
     * @return string
     */
    public static function strip(string $input, array|string $except = null): string
    {
        $left = is_string($except) ? array_slice(func_get_args(), 1) : $except;

        return strip_tags($input, $left);
    }

    /**
     * Strips tag attributes.
     *
     * @param string $input
     * @param string[]|string $attr
     * @return string
     */
    public static function stripAttributes(string $input, array|string $attr = 'style'): string
    {
        $regexps = array_map(
            fn ($a) => '/(<[^>]+) ' . $a . '=".*?"/i',
            is_string($attr) ? array_slice(func_get_args(), 1) : $attr
        );

        return preg_replace($regexps, '$1', $input);
    }

    /**
     * Strips blocks of tags which are meant to provide spacing.
     *
     * @param string $input
     * @return string
     */
    public static function stripSpacingBlocks(string $input): string
    {
        $regexps = ['/<p> <\/p>/i', '/<p><\/p>/i', '/<p><br><\/p>/i', '/<p><br\/><\/p>/i', '/<br>/i', '/<br\/>/i', '/<br />/i'];

        return preg_replace($regexps, '<br>', $input);
    }

    /**
     * Strips blocks of tags which are meant to provide spacing.
     *
     * @param string $input
     * @return string
     */
    public static function stripEmptyInlines(string $input): string
    {
        $regexps = ['/<span> <\/span>/i'];

        return preg_replace($regexps, '', $input);
    }

    /**
     * Runs "HtmlTidy" on the supplied input w/the given options.
     *
     * @param string $input
     * @param array $options
     * @return string
     * @throws Exception
     */
    public static function tidy(string $input, array $options = []): string
    {
        if (!extension_loaded('tidy')) {
            throw new Exception('Html::tidy requires tidy extension!');
        }

        $opts = array_merge(static::$tidyDefaultOptions, $options);

        $tidy = new tidy();

        if ($tidy->parseString($input, $opts)) {
            if ($tidy->cleanRepair()) {
                return (string) $tidy;
            }
        }

        return $input;
    }

    /**
     * *Safely* cleans the supplied html input string.
     *
     * @param string $input
     * @param array $tidyOpts
     * @return string
     * @throws Exception
     */
    public static function clean(string $input, array $tidyOpts = []): string
    {
        if (!extension_loaded('tidy')) {
            throw new Exception('Html::clean requires tidy extension!');
        }

        $output = Html::stripAttributes($input, 'style', 'class', 'role');
        $output = Html::tidy($output, $tidyOpts);
        $output = Html::stripSpacingBlocks($output);
        $output = Html::stripEmptyInlines($output);

        return Html::tidy($output, $tidyOpts);
    }

    /**
     * Tidy default options.
     *
     * @var array
     */
    protected static array $tidyDefaultOptions = [
        // Enable partial HTML support
        'show-body-only' => true,
        // Disable text-wrapping
        'wrap' => 0,
        // Perform full-cleanup of bad attributes, ms-word shit, etc.
        'bare' => true,
        // Convert <b>, <i> to <strong>, <em>
        'logical-emphasis' => true,
        // All high-level text is enclosed in a <p>
        'enclose-text' => true,
    ];
}
