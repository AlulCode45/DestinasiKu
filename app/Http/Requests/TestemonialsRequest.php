<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestemonialsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'guest_id' => 'required|integer',
            'destination_id' => 'required|integer',
            'content' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'guest_id.required' => 'ID Tamu tidak boleh kosong',
            'guest_id.integer' => 'ID Tamu harus berupa angka',
            'destination_id.required' => 'ID Destinasi tidak boleh kosong',
            'destination_id.integer' => 'ID Destinasi harus berupa angka',
            'content.required' => 'Konten tidak boleh kosong'
        ];
    }
}