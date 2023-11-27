<?php

namespace App\Rules;

use App\Models\Language as LanguageModel;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Language implements ValidationRule
{
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
        foreach (array_keys($value) as $language){
            $languageModel = LanguageModel::name($language)->first();
            if (is_null($languageModel)){
                $fail("Language {$language} does not exists.");
            }
        }
    }
}
