<?php

namespace App\Http\Requests;

use App\Models\Skill;
use App\Rules\Ownership;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExperienceRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.experiences.create';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return !is_null(current_user());
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'position' => array_filter($this->get('position')),
            'company' => array_filter($this->get('company')),
            'location' => array_filter($this->get('location')),
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
            'position' => ['required', 'array', new Language()],
            'position.*' => ['required', 'string'],
            'company' => ['required', 'array', new Language()],
            'company.*' => ['required', 'string'],
            'location' => ['required', 'array', new Language()],
            'location.*' => ['required', 'string'],
            'description' => ['required', 'array', new Language()],
            'description.*' => ['required', 'string'],
            'start_date' =>  ['required', 'date'],
            'finish_date' => ['required_without:currently', 'date', 'after:start_date'],
            'currently' => ['required_without:finish_date'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['required','exists:skills,id', new Ownership(Skill::class)]
        ];
    }
}
