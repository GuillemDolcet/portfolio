<?php

namespace App\Services;

use App\Models\Language;
use DeepL\DeepLException;
use DeepL\Translator as Deepl;

class Translator
{
    /**
     * Deepl Translator Client.
     *
     * @param Deepl $deepl
     */
    protected Deepl|null $deepl;

    /**
     * Class constructor.
     *
     * @return void
     * @throws DeepLException
     */
    public function __construct()
    {
        $this->deepl = new Deepl(config('services.deepl.token'));
    }

    /**
     * Translate text from a source language.
     *
     * @param array $attributes
     * @param array $translatableAttributes
     * @return array
     * @throws DeepLException
     */
    public function translate(array $attributes, array $translatableAttributes): array
    {
        foreach ($translatableAttributes as $attribute){
            $keys = array_keys($attributes[$attribute]);
            $targetLanguages = Language::whereNotIn('name',$keys)->get()->pluck('name')->toArray();
            foreach ($targetLanguages as $targetLanguage){
                $target = $targetLanguage;
                if ($targetLanguage == 'en'){
                    $target = 'en-GB';
                }
                $result = $this->deepl->translateText(reset($attributes[$attribute]), key($attributes[$attribute]), $target)->text;
                $attributes[$attribute][$targetLanguage] = $result;
            }
        }
        return $attributes;
    }
}
