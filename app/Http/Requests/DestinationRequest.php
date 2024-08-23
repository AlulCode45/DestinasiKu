<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationRequest extends FormRequest
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
            'name' => 'required|string|unique:destinations,name',
            'description' => 'required|string',
            'province_id' => 'required|integer',
            'regency_id' => 'required|integer',
            'district_id' => 'required|integer',
            'village_id' => 'required|integer',
            'destination_company_id' => 'required|integer',
            'price' => 'required|integer',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'name.required' => 'Nama tidak boleh kosong',
            'name.unique' => 'Nama sudah digunakan',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'province_id.required' => 'Provinsi tidak boleh kosong',
            'regency_id.required' => 'Kabupaten tidak boleh kosong',
            'district_id.required' => 'Kecamatan tidak boleh kosong',
            'village_id.required' => 'Desa tidak boleh kosong',
            'destination_company_id.required' => 'Perusahaan Destinasi Wisata tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'image.*.required' => 'Gambar wajib diisi',
            'image.*.image' => 'File harus berupa gambar',
            'image.*.mimes' => 'File harus berupa file dengan tipe: jpeg, png, jpg, gif, svg',
            'image.*.max' => 'File harus kurang dari 2048 kilobytes',
        ];
    }
}