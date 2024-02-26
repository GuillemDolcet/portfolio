<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.users.edit';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return current_user()->hasRole(['admin']) || $this->user->getKey() == current_user()->getKey();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [];
        if (current_user()->hasRole(['admin'])){
            $rules['role'] = ['required', 'exists:roles,id'];
        }
        return array_merge([
            'name' => ['required', 'min: 3', 'max: 50'],
            'password' =>  ['nullable', 'confirmed', Password::defaults()],
            'date_of_birth' => ['nullable', 'date'],
            'phone' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'x' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string']
        ], $rules);
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        if ($this->user) {
            return $this->redirector->getUrlGenerator()->route($this->redirectRoute, $this->user);
        }

        return parent::getRedirectUrl();
    }
}
