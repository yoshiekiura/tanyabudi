<?php

namespace App\Http\Requests\Admin\Paket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditPaketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id_produk = $this->route('id_produk');
        return [
            'nama_paket' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'deskripsi' => 'string',
            'gambar' => 'image|mimes:png,jpeg,jpg|dimensions:min_height=300,min_width=500',
            'kategori' => ['required',Rule::in(["1", "2"])],
            'nama_travel' => 'required|string|max:30',
            'id_travel' => 'required|string|max:10|unique:tbl_paket,id_travel,'.$id_produk.',id_produk',
            'gambar_travel' => 'image|mimes:png,jpeg,jpg|dimensions:min_height=150,min_width=150',
            'perjalanan' => 'string',
            'kuota' => 'required|numeric',
            'sekamar' => 'required|string',
            'keberangkatan' => 'required|date',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ];
    }
}
