<?php

namespace App\Http\Requests;

use App\Models\Skill;
use App\Rules\Ownership;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class EducationStoreRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.education.create';

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
            'school' => array_filter($this->get('school')),
            'degree' => array_filter($this->get('degree')),
            'discipline' => array_filter($this->get('discipline')),
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
            'school' => ['required', 'array', new Language()],
            'school.*' => ['required', 'string', 'max:100'],
            'degree' => ['required', 'array', new Language()],
            'degree.*' => ['required', 'string', 'max:100'],
            'discipline' => ['required', 'array', new Language()],
            'discipline.*' => ['required', 'string', 'max:100'],
            'description' => ['required', 'array', new Language()],
            'description.*' => ['required', 'string'],
            'start_date' =>  ['required', 'date'],
            'finish_date' => ['required', 'date', 'after:start_date'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['required','exists:skills,id']
        ];
    }
}
