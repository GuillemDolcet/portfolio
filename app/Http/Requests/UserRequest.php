<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.users.create';

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
            'name' => ['required', 'min: 3', 'max: 50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' =>  ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'exists:roles,id'],
        ];

        if ($this->user && $this->user->exists) {
            $rules['password'] = ['nullable', 'confirmed', Password::defaults()];
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
        if ($this->user && $this->user->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.users.edit', $this->user);
        }

        return parent::getRedirectUrl();
    }
}
