<?php

namespace App\Support;

use Illuminate\Http\Request;

class Parameters
{
    /**
     * The current request object instance.
     *
     * @var Request
     */
    protected Request $request;

    /**
     * UrlGenerator constructor.
     *
     * @param Request $request
     * @return  void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the all the query parameter values.
     *
     * @return  array
     */
    public function all(): array
    {
        return $this->request->all();
    }

    /**
     * Get the provided query parameter value by name.
     *
     * @param string|null $name
     * @param mixed|null $default
     * @return  mixed
     */
    public function get(string $name = null, mixed $default = null): mixed
    {
        if (is_null($name)) {
            return $this->all();
        }

        return $this->request->input($name, $default);
    }

    /**
     * Return an array with the supplied request parameters by name.
     *
     * @param array|string $parameters
     * @return array
     */
    public function only(array|string $parameters): array
    {
        if (is_string($parameters)) {
            $parameters = func_get_args();
        }

        // Treat the last argument as an array of extra parameters to be merged
        // in. If we detect that the last argument is an array we extract
        // it, and we'll merge it back later
        $extra = [];
        if (is_array($parameters[count($parameters) - 1])) {
            $extra = array_pop($parameters);
        }

        $results = array_combine($parameters, array_map(function ($key) {
            return $this->request->input($key);
        }, $parameters));

        // Merge back the extra arguments here
        if (! empty($extra)) {
            $results = array_merge($results, $extra);
        }

        return array_filter($results, function ($value) {
            return ! is_null($value);
        });
    }

    /**
     * Return a with all the request parameters *without* the supplied list (by name).
     *
     * @param array|string $parameters
     * @return array
     */
    public function except(array|string $parameters): array
    {
        if (is_string($parameters)) {
            $parameters = func_get_args();
        }

        return Arr::except($this->request->all(), $parameters);
    }

    /**
     * Return <input type="hidden"> tags for the supplied parameters.
     *
     * @param array|string $parameters
     * @return string
     */
    public function hiddenTags(array|string $parameters): string
    {
        if (is_string($parameters)) {
            $parameters = func_get_args();
        }

        $output = '';
        $params = $this->only($parameters);
        foreach ($params as $name => $value) {
            $output .= "<input type=\"hidden\" name=\"$name\" value=\"$value\">";
        }

        return $output;
    }
}
