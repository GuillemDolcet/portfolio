<?php

namespace App\Support;

use NumberFormatter;

class Num
{
    /**
     * The number formatter (generic).
     *
     * @var NumberFormatter|null
     */
    protected static ?NumberFormatter $formatter = null;

    /**
     * The number formatter for prices.
     *
     * @var NumberFormatter|null
     */
    protected static ?NumberFormatter $priceFormatter = null;

    /**
     * Without vat.
     *
     * @var bool
     */
    protected static bool $withoutVAT = false;

    /**
     * Applies given percentage to supplied price.
     *
     * @param  float  $price
     * @param  float $percent
     * @return float
     */
    public static function applyPercent(float $price, float $percent = 0): float
    {
        return round($price * (1 + ($percent / 100)), 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Applies given percentage as a discount.
     *
     * @param float $price
     * @param float $percent
     * @return float
     */
    public static function applyDiscount(float $price, float $percent = 0): float
    {
        return round($price - static::applyPercent($price, 100.0 - $percent), 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Applies given margin to supplied price.
     *
     * @param  float $price
     * @param  float $margin
     * @return float
     */
    public static function applyMargin(float $price, float $margin = 0): float
    {
        return round(($price / (100 - $margin)) * 100, 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Applies given margin to supplied price.
     *
     * @param  float $price
     * @param  float $margin
     * @return float
     */
    public static function extractMargin(float $price, float $margin = 0): float
    {
        return round(($price * ((100 - $margin) / 100)), 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Extracts given percentage from supplied price.
     *
     * @param  float $price
     * @param  float $percent
     * @return float
     */
    public static function extractPercent(float $price, float $percent = 0): float
    {
        return round($price / (1 + ($percent / 100)), 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Computes the given margin between a cost and a sale price.
     *
     * @param  float $cost
     * @param  float $price
     * @return float
     */
    public static function margin(float $cost, float $price): float
    {
        if ($price == 0) {
            return 0;
        }

        return round((1 - ($cost / $price)) * 100, 1, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Computes the given "markup" percent between a cost and a sale price.
     *
     * @param  float $cost
     * @param  float $price
     * @return float
     */
    public static function markup(float $cost, float $price): float
    {
        if ($cost == 0) {
            return 0;
        }

        return round((($price - $cost) / $cost) * 100, 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Extract VAT from a number. Alias for extract percent with VAT defaults.
     *
     * @param float $price
     * @param float|null $percent
     * @return  float
     */
    public static function withoutVAT(float $price, ?float $percent = null): float
    {
        return static::extractPercent($price, $percent ?: config('site.default_vat', 21.0));
    }

    /**
     * Apply VAT to a number. Alias for apply percent with VAT defaults.
     *
     * @param float $price
     * @param float|null $percent
     * @return  float
     */
    public static function withVAT(float $price, ?float $percent = null): float
    {
        return static::applyPercent($price, $percent ?: config('site.default_vat', 21.0));
    }

    /**
     * Round to nearest int (up & down).
     *
     * @param   float $value
     * @return  int
     */
    public static function roundToNearestInt(float $value): int
    {
        return (int) round($value, 0, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Rounds to nearest X.YY "nice" price. (Defaults to: .95 fractions).
     *
     * @param  float  $value
     * @param  float  $frac
     * @return float
     */
    public static function roundToNearestNice(float $value, float $frac = 0.95): float
    {
        return round(static::roundToNearestInt($value) - (1 - $frac), 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Rounds to nearest X.YY "nice" price (UP). (Defaults to: .95 fractions).
     *
     * @param  float  $value
     * @param  float  $frac
     * @return float
     */
    public static function roundUpNice(float $value, float $frac = 0.95): float
    {
        return round(ceil($value) - (1 - $frac), 2, PHP_ROUND_HALF_EVEN);
    }

    /**
     * Returns a price-formatted string from its input value.
     *
     * @param  float  $value
     * @return string
     */
    public static function price(float $value): string
    {
        if (static::$withoutVAT) {
            return static::priceFormatter()->format(static::withoutVAT($value));
        }

        return static::priceFormatter()->format($value);
    }

    /**
     * Returns a generically formatted number string.
     *
     * @param float $value
     * @return string
     */
    public static function number(float $value): string
    {
        if (static::$withoutVAT) {
            return static::formatter()->format(static::withoutVAT($value));
        }

        return static::formatter()->format($value);
    }

    /**
     * Comparison function suitable for working with price values. Floating point
     * precision is unreliable in most programming languages, so these things are
     * needed.
     *
     * @param  float  $a
     * @param  float  $b
     * @param  float  $tolerance
     * @return bool
     */
    public static function equals(float $a, float $b, float $tolerance = 0.001): bool
    {
        if ($a == $b) {
            return true;
        }

        return abs($a - $b) < $tolerance;
    }

    /**
     * Gets a number formatter suitable for prices (with memoization).
     *
     * @return NumberFormatter
     */
    public static function priceFormatter(): NumberFormatter
    {
        if (! is_null(static::$priceFormatter)) {
            return static::$priceFormatter;
        }

        static::$priceFormatter  = new NumberFormatter('ca_ES', NumberFormatter::CURRENCY);
        static::$priceFormatter->setPattern('#,##0.##¤');
        static::$priceFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
        static::$priceFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);

        return static::$priceFormatter;
    }

    /**
     * Gets a generic number formatter (with memoization).
     *
     * @return NumberFormatter
     */
    public static function formatter(): NumberFormatter
    {
        if (! is_null(static::$formatter)) {
            return static::$formatter;
        }

        static::$formatter  = new NumberFormatter('ca_ES', NumberFormatter::DECIMAL);
        static::$formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
        static::$formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);

        return static::$formatter;
    }

    /**
     * Sets withoutVAT flag.
     *
     * @param bool $value
     * @return void
     */
    public static function setWithoutVAT(bool $value): void
    {
        static::$withoutVAT = $value;
    }
}
