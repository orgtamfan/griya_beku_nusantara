<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * Note: "image" is optional on update — the admin may keep the
     * existing product photo and only change the other fields.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:150'],
            'price' => ['required', 'numeric', 'min:1000'],
            'weight_gram' => ['required', 'integer', 'min:50'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    /**
     * Custom attribute names for nicer validation messages.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'category_id' => 'kategori',
            'name' => 'nama produk',
            'price' => 'harga',
            'weight_gram' => 'berat (gram)',
            'stock' => 'stok',
            'description' => 'deskripsi',
            'image' => 'foto produk',
        ];
    }
}
