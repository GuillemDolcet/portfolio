<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Ownership implements ValidationRule
{
    /**
     * Model instance
     *
     * @param string $model
     */
    protected string $model;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $object = is_object($value) ? $value : (new $this->model)->find($value);

        if (is_null($object) || $object->user_id != current_user()->getKey()){
            $fail('The :attribute does not belong to this user.');
        }
    }
}
