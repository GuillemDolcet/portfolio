<?php

namespace App\Http\Requests;

use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoStoreRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.personalInfo.create';

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
            'location' => array_filter($this->get('location'))
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
            'firstName' => ['required', 'max: 50'],
            'lastName' => ['required', 'max: 200'],
            'phone' => ['nullable', 'string'],
            'email' =>  ['required', 'email'],
            'date_of_birth' => ['nullable', 'date'],
            'linkedin' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'github' => ['nullable', 'string'],
            'image' =>  ['required', 'image', 'max:10000'],
            'cv' =>  ['required', 'mimes:pdf', 'max:10000'],
            'location' => ['required', 'array', new Language()],
            'location.*' => ['required', 'string', 'max:100']
        ];
    }
}
