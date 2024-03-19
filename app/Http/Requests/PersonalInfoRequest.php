<?php

namespace App\Http\Requests;

use App\Models\PersonalInfo;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoRequest extends FormRequest
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
        if ($this->personalInfo && $this->personalInfo->exists) {
            return current_user()->can('update', $this->personalInfo);
        }

        return current_user()->can('store', PersonalInfo::class);
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
        $rules = [
            'firstName' => ['required', 'max: 50'],
            'lastName' => ['required', 'max: 200'],
            'phone' => ['required', 'string'],
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

        if ($this->personalInfo && $this->personalInfo->exists){
            $rules['image'] = ['nullable', 'image', 'max:10000'];
            $rules['cv'] = ['nullable', 'mimes:pdf', 'max:10000'];
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
        if ($this->personalInfo && $this->personalInfo->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.personalInfo.edit', $this->personalInfo);
        }

        return parent::getRedirectUrl();
    }
}
