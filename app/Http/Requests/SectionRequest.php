<?php

namespace App\Http\Requests;

use App\Models\Section;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.sections.create';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if ($this->section && $this->section->exists) {
            return current_user()->can('update', $this->section);
        }

        return current_user()->can('store', Section::class);
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'tag' => array_filter($this->get('tag')),
            'title' => array_filter($this->get('title')),
            'description' => array_filter($this->get('description')),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string','unique:sections,name'],
            'tag' => ['required', 'array', new Language()],
            'tag.*' => ['required', 'string', 'max:100'],
            'title' => ['required', 'array', new Language()],
            'title.*' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'array', new Language()],
            'description.*' => ['required', 'string'],
        ];

        if ($this->section && $this->section->exists){
            unset($rules['name']);
        }

        return $rules;
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        if ($this->section && $this->section->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.sections.edit', $this->section);
        }

        return parent::getRedirectUrl();
    }
}
