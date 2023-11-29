<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillUpdateRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.skills.edit';

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
            'name' => ['required', 'max: 50'],
            'level' => ['required', 'integer', 'min:1', 'max:100'],
            'image' =>  ['nullable', 'image', 'max:10000'],
            'order' => ['nullable', 'integer']
        ];
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        if ($this->skill) {
            return $this->redirector->getUrlGenerator()->route($this->redirectRoute, $this->skill);
        }

        return parent::getRedirectUrl();
    }
}
