<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Return true karena sudah dilindungi middleware auth
        return true;
    }

    public function rules(): array
    {
        $product = $this->route('product');

        return [
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:' . ($product ? $product->stock : 999)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.required' => 'Jumlah produk wajib diisi.',
            'quantity.integer' => 'Jumlah harus berupa angka.',
            'quantity.min' => 'Jumlah minimal 1.',
            'quantity.max' => 'Stok tidak mencukupi! Maksimal :max',
        ];
    }
}
