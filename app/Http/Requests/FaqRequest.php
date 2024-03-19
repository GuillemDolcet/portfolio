<?php

namespace App\Http\Requests;

use App\Models\Faq;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.faqs.create';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if ($this->faq && $this->faq->exists) {
            return current_user()->can('update', $this->faq);
        }

        return current_user()->can('store', Faq::class);
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'question' => array_filter($this->get('question')),
            'answer' => array_filter($this->get('answer'))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'question' => ['required', 'array', new Language()],
            'question.*' => ['required', 'string', 'max:100'],
            'answer' => ['required', 'array', new Language()],
            'answer.*' => ['required', 'string'],
            'order' => ['nullable', 'integer', 'max:9999999999']
        ];
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        if ($this->faq && $this->faq->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.faqs.edit', $this->faq);
        }

        return parent::getRedirectUrl();
    }
}
