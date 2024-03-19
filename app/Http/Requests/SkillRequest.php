<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.skills.create';

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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'max: 50'],
            'level' => ['required', 'integer', 'min:1', 'max:100'],
            'image' =>  ['required', 'image', 'max:10000'],
            'order' => ['nullable', 'integer', 'max:9999999999']
        ];

        if ($this->skill && $this->skill->exists) {
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
        if ($this->skill && $this->skill->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.skills.edit', $this->skill);
        }

        return parent::getRedirectUrl();
    }
}
