<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.projects.create';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if ($this->project && $this->project->exists) {
            return current_user()->can('update', $this->project);
        }

        return current_user()->can('store', Project::class);
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
        $rules =  [
            'name' => ['required', 'array', new Language()],
            'name.*' => ['required', 'string', 'max:100'],
            'description' => ['required', 'array', new Language()],
            'description.*' => ['required'],
            'image' =>  ['required', 'image', 'max:10000'],
            'url' =>  ['nullable', 'string', 'max:254'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['required','exists:skills,id'],
            'order' =>  ['nullable', 'integer']
        ];

        if ($this->project && $this->project->exists) {
            $rules['image'] = ['nullable', 'image', 'max:10000'];
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
        if ($this->project && $this->project->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.projects.edit', $this->project);
        }

        return parent::getRedirectUrl();
    }
}
