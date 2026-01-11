<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


/**
 * Request for validating and authorizing contact update.
 *
 * Validates name, contact (unique, 9 digits), and email (unique, email format).
 */
class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:6',
            'contact' => [
                'required',
                'digits:9',
                Rule::unique('contacts')->ignore($this->route('contact'))->whereNull('deleted_at'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($this->route('contact'))->whereNull('deleted_at'),
            ],
        ];
    }
}
