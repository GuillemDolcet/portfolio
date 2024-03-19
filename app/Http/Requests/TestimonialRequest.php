<?php

namespace App\Http\Requests;

use App\Rules\Language;
use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'admin.testimonials.create';

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
            'job' => array_filter($this->get('job')),
            'comment' => array_filter($this->get('comment'))
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
            'name' => ['required', 'string'],
            'job' => ['required', 'array', new Language()],
            'job.*' => ['required', 'string', 'max:100'],
            'comment' => ['required', 'array', new Language()],
            'comment.*' => ['required', 'string'],
            'image' =>  ['nullable', 'image', 'max:10000'],
        ];
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        if ($this->testimonial && $this->testimonial->exists) {
            return $this->redirector->getUrlGenerator()->route('admin.testimonials.edit', $this->testimonial);
        }

        return parent::getRedirectUrl();
    }
}
