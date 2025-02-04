<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name'=>'required|string|max:128',
            'email'=>'required|email',
            'phone'=>'required|regex:/^\+\d{1,3}\d{9}$/',
            'start_date'=>'required',
            'end_date'=>'required',
            'sports'=>'required'
        ];
    }
}
