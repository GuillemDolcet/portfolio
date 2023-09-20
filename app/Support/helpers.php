<?php

use App\Models\User;
use App\Support\Asset;
use App\Support\Num;
use App\Support\Parameters;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\HtmlString;

// Assets //////////////////////////////////////////////////////////////////////

if (!function_exists('asset_path')) {
    /**
     * Returns the path to an asset (can be versioned if a mix-manifest.json file exists).
     *
     * @param string $path
     * @return string
     */
    function asset_path(string $path): string
    {
        return Asset::path($path);
    }
}

if (!function_exists('javascript_path')) {
    /**
     * Return the path to a javascript asset (or versioned one if exists).
     *
     * @param  string  $path
     * @return string
     */
    function javascript_path(string $path): string
    {
        return Asset::javascriptPath($path);
    }
}

if (!function_exists('stylesheet_path')) {
    /**
     * Return the path to a stylesheet asset (or versioned one if exists).
     *
     * @param  string  $path
     * @return string
     */
    function stylesheet_path(string $path): string
    {
        return Asset::stylesheetPath($path);
    }
}

if (!function_exists('image_path')) {
    /**
     * Return the path to an image asset (or versioned one if exists).
     *
     * @param string $path
     * @return string
     */
    function image_path(string $path): string
    {
        return Asset::imagePath($path);
    }
}

if (!function_exists('font_path')) {
    /**
     * Return the path to a font asset (or versioned one if exists).
     *
     * @param string $path
     * @return string
     */
    function font_path(string $path): string
    {
        return Asset::fontPath($path);
    }
}

if (!function_exists('asset_url')) {
    /**
     * Returns the path to an asset (can be versioned if a mix-manifest.json file exists).
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function asset_url(string $path, ?bool $secure = null): string
    {
        return Asset::url($path, $secure);
    }
}

if (!function_exists('javascript_url')) {
    /**
     * Return the path to a javascript asset (or versioned one if exists).
     *
     * @param  string  $path
     * @param bool|null $secure
     * @return string
     */
    function javascript_url(string $path, ?bool $secure = null): string
    {
        return Asset::javascriptUrl($path, $secure);
    }
}

if (!function_exists('stylesheet_url')) {
    /**
     * Return the path to a stylesheet asset (or versioned one if exists).
     *
     * @param  string  $path
     * @param bool|null $secure
     * @return string
     */
    function stylesheet_url(string $path, ?bool $secure = null): string
    {
        return Asset::stylesheetUrl($path, $secure);
    }
}

if (!function_exists('image_url')) {
    /**
     * Return the path to an image asset (or versioned one if exists).
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function image_url(string $path, ?bool $secure = null): string
    {
        return Asset::imageUrl($path, $secure);
    }
}

if (!function_exists('font_url')) {
    /**
     * Return the path to a font asset (or versioned one if exists).
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function font_url(string $path, ?bool $secure = null): string
    {
        return Asset::fontUrl($path, $secure);
    }
}

// User ////////////////////////////////////////////////////////////////////////

if (!function_exists('current_user')) {
    /**
     * Get the currently logged in customer.
     *
     * @param string|null $guard
     * @return User|Authenticatable|null
     */
    function current_user(?string $guard = null): User|Authenticatable|null
    {
        return auth($guard)->user();
    }
}

// Numbers/Price ///////////////////////////////////////////////////////////////

if (! function_exists('apply_percent')) {
    /**
     * Applies given percent to supplied price.
     *
     * @param  float $price
     * @param  float $percent
     * @return float
     */
    function apply_percent(float $price, float $percent = 0): float
    {
        return Num::applyPercent($price, $percent);
    }
}

if (! function_exists('apply_discount')) {
    /**
     * Applies given percent to supplied price.
     *
     * @param  float $price
     * @param  float $percent
     * @return float
     */
    function apply_discount(float $price, float $percent = 0): float
    {
        return Num::applyDiscount($price, $percent);
    }
}

if (! function_exists('apply_margin')) {
    /**
     * Applies given margin to supplied price.
     *
     * @param  float $price
     * @param  float $margin
     * @return float
     */
    function apply_margin(float $price, float $margin = 0): float
    {
        return Num::applyMargin($price, $margin);
    }
}

if (! function_exists('extract_margin')) {
    /**
     * Applies given margin to supplied price.
     *
     * @param  float $price
     * @param  float $margin
     * @return float
     */
    function extract_margin(float $price, float $margin = 0): float
    {
        return Num::extractMargin($price, $margin);
    }
}

if (! function_exists('extract_percent')) {
    /**
     * Extracts given percentage from supplied price.
     *
     * @param  float $price
     * @param  float $percent
     * @return float
     */
    function extract_percent(float $price, float $percent = 0): float
    {
        return Num::extractPercent($price, $percent);
    }
}

if (! function_exists('margin')) {
    /**
     * Computes the given margin between a cost and a sale price.
     *
     * @param  float $cost
     * @param  float $price
     * @return float
     */
    function margin(float $cost, float $price): float
    {
        return Num::margin($cost, $price);
    }
}

if (! function_exists('markup')) {
    /**
     * Computes the given markup between a cost and a sale price.
     *
     * @param  float $cost
     * @param  float $price
     * @return float
     */
    function markup(float $cost, float $price): float
    {
        return Num::markup($cost, $price);
    }
}

if (! function_exists('without_vat')) {
    /**
     * Extract VAT from a number. Alias of `extract_percent`.
     *
     * @param   float $with_vat
     * @param   float|null $percent
     * @return  float
     */
    function without_vat(float $with_vat, ?float $percent = null): float
    {
        return Num::withoutVAT($with_vat, $percent);
    }
}

if (! function_exists('with_vat')) {
    /**
     * Extract VAT from a number. Alias of `extract_percent`.
     *
     * @param   float $without_vat
     * @param   float|null $percent
     * @return  float
     */
    function with_vat(float $without_vat, ?float $percent = null): float
    {
        return Num::withVAT($without_vat, $percent);
    }
}

if (!function_exists('price')) {
    /**
     * Returns a price-formatted string from its input value.
     *
     * @param  float $value
     * @return string
     */
    function price(float $value): string
    {
        return Num::price($value);
    }
}

if (!function_exists('number')) {
    /**
     * Returns a number formatted string from its input value.
     *
     * @param  float $value
     * @return string
     */
    function number(float $value): string
    {
        return Num::number($value);
    }
}

if (!function_exists('render_price')) {
    /**
     * Returns a price-formatted string from its input value.
     *
     * @param  float $value
     * @return HtmlString
     */
    function render_price(float $value): HtmlString
    {
        $price_string = Num::price($value);

        $parts = explode(',', str_replace('€', '', $price_string));

        $decimals = isset($parts[1]) ? ",$parts[1]" : '';

        return new HtmlString("$parts[0]<small>{$decimals}€</small>");
    }
}

if (!function_exists('render_percent')) {
    /**
     * Returns a percent-formatted string from its input value.
     *
     * @param  float $value
     * @return HtmlString
     */
    function render_percent(float $value): HtmlString
    {
        $price_string = Num::number($value);

        $parts = explode(',', str_replace('%', '', $price_string));

        $decimals = isset($parts[1]) ? ",$parts[1]" : '';

        return new HtmlString("$parts[0]<small>$decimals%</small>");
    }
}

if (!function_exists('round_up_nice')) {
    /**
     * Rounds to nearest X.YY "nice" price (UP). (Defaults to: .95 fractions).
     *
     * @param  float  $value
     * @param  float  $frac
     * @return float
     */
    function round_up_nice(float $value, float $frac = 0.95): float
    {
        return Num::roundUpNice($value, $frac);
    }
}

if (!function_exists('round_nearest_nice')) {
    /**
     * Rounds to nearest int w/X.YY "nice" price (UP/DOWN).
     *
     * @param float $value
     * @param  float  $frac
     * @return float
     */
    function round_nearest_nice(float $value, float $frac = 0.95): float
    {
        return Num::roundToNearestNice($value, $frac);
    }
}

// URL parameters handling /////////////////////////////////////////////////////

if (! function_exists('params')) {
    /**
     * Get the provided query parameter value by name.
     *
     * @param string|null $name
     * @param mixed|null $default
     * @throws
     * @return  mixed
     */
    function params(string $name = null, mixed $default = null): mixed
    {
        return app(Parameters::class)->get($name, $default);
    }
}

if (! function_exists('with_params')) {
    /**
     * Return an array with the supplied request parameters by name.
     *
     * @param array|string $parameters
     * @return array
     */
    function with_params(array|string $parameters): array
    {
        if (is_string($parameters)) {
            $parameters = func_get_args();
        }

        return app(Parameters::class)->only($parameters);
    }
}

if (! function_exists('without_params')) {
    /**
     * Return a with all the request parameters *without* the supplied list (by name).
     *
     * @param array|string $parameters
     * @return array
     */
    function without_params(array|string $parameters): array
    {
        if (is_string($parameters)) {
            $parameters = func_get_args();
        }

        return app(Parameters::class)->except($parameters);
    }
}

if (! function_exists('params_hidden_tags')) {
    /**
     * Return <input type="hidden"> tags for the supplied parameters.
     *
     * @param array|string $parameters
     * @return string
     */
    function params_hidden_tags(array|string $parameters): string
    {
        if (is_string($parameters)) {
            $parameters = func_get_args();
        }

        return app(Parameters::class)->hiddenTags($parameters);
    }
}
