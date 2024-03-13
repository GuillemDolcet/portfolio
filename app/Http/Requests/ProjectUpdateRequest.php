<?php

namespace App\Http\Requests;

use App\Models\Skill;
use App\Rules\Ownership;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.projects.edit';

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
            'name' => array_filter($this->get('name')),
            'description' => array_filter($this->get('description'))
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
            'name' => ['required', 'array', new Language()],
            'name.*' => ['required', 'string', 'max:100'],
            'description' => ['required', 'array', new Language()],
            'description.*' => ['required', 'string'],
            'image' =>  ['nullable', 'image', 'max:10000'],
            'url' =>  ['nullable', 'string', 'max:254'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['required','exists:skills,id'],
            'order' =>  ['nullable', 'integer']
        ];
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        if ($this->project) {
            return $this->redirector->getUrlGenerator()->route($this->redirectRoute, $this->project);
        }

        return parent::getRedirectUrl();
    }
}
