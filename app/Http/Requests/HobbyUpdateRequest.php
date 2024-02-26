<?php

namespace App\Http\Requests;

use App\Models\Skill;
use App\Rules\Ownership;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class HobbyUpdateRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.hobbies.edit';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return current_user()->hasRole(['admin']) || $this->hobby->user->getKey() == current_user()->getKey();
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => array_filter($this->get('name'))
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
            'name' => ['required', 'array', new Language()],
            'name.*' => ['required', 'string', 'max:100'],
            'order' => ['nullable', 'integer', 'max:9999999999'],
            'image' =>  ['nullable', 'image', 'max:10000']
        ];
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        if ($this->hobby) {
            return $this->redirector->getUrlGenerator()->route($this->redirectRoute, $this->hobby);
        }

        return parent::getRedirectUrl();
    }
}
