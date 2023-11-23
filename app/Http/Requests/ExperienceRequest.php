<?php

namespace App\Http\Requests;

use App\Models\Skill;
use App\Rules\Ownership;
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max: 255'],
            'description' => ['required'],
            'start_date' =>  ['required', 'date'],
            'finish_date' => ['required_without:currently', 'date', 'after:start_date'],
            'currently' => ['required_without:finish_date', 'date', 'after:start_date'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['required','exists:skills,id', new Ownership(Skill::class)]
        ];
    }
}
