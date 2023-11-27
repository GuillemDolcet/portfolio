<?php

namespace App\Services;

use DeepL\DeepLException;
use DeepL\Translator;

class DeeplService
{
    /**
     * Deepl Translator Client.
     *
     * @param Translator $translator
     */
    protected Translator|null $translator;

    /**
     * Class constructor.
     *
     * @return void
     * @throws DeepLException
     */
    public function __construct()
    {
        $this->translator = new Translator(config('services.token'));
    }

    /**
     * Translate text from a source language.
     *
     * @param string $text
     * @param string|null $sourceLanguage
     * @param array $targetLanguages
     * @return array
     * @throws DeepLException
     */
    public function translate(string $text, string|null $sourceLanguage, array $targetLanguages): array
    {
        $translations = [];
        foreach ($targetLanguages as $target){
            $result = $this->translator->translateText($text, $sourceLanguage, $target);
            $translations[$target] = $result->text;
        }
        return $translations;
    }
}
