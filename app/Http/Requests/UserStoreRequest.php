<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserStoreRequest extends FormRequest
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
        return [
            'name' => ['required', 'min: 3', 'max: 50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' =>  ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'exists:roles,id'],
            'date_of_birth' => ['nullable', 'date'],
            'phone' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'x' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string']
        ];
    }
}
