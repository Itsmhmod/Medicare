<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => 'required|string|min:5',
            'phone' => 'required|min:11',
            'days' => 'required',
            'email' => 'required|email|max:255',
            'facebook' => 'required|string|max:255|min:20',
            'instagram' => 'required|string|max:255|min:20',
            'linkedin' => 'required|string|max:255|min:20',
            'X' => 'required|string|max:255|min:20',
            'specialization_id' => 'required',
            'image' => 'required',
        ];
    }
}
