<?php

namespace App\Http\Requests;

use App\Models\Service;
use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.services.create';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if ($this->service && $this->service->exists) {
            return current_user()->can('update', $this->service);
        }

        return current_user()->can('store', Service::class);
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => array_filter($this->get('title')),
            'description' => array_filter($this->get('description'))
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
            'title' => ['required', 'array', new Language()],
            'title.*' => ['required', 'string', 'max:100'],
            'description' => ['required', 'array', new Language()],
            'description.*' => ['required', 'string'],
            'image' => ['required', 'image', 'max:10000'],
            'order' => ['nullable', 'integer']
        ];

        if ($this->service && $this->service->exists) {
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
        if ($this->service && $this->service->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.services.edit', $this->service);
        }

        return parent::getRedirectUrl();
    }
}
