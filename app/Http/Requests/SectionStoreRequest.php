<?php

namespace App\Http\Requests;

use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class SectionStoreRequest extends FormRequest
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
        return current_user()->hasRole(['admin']);
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
        return [
            'name' => ['required', 'string'],
            'tag' => ['required', 'array', new Language()],
            'tag.*' => ['required', 'string', 'max:100'],
            'title' => ['required', 'array', new Language()],
            'title.*' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'array', new Language()],
            'description.*' => ['required', 'string'],
        ];
    }
}
