<?php

namespace App\Http\Requests\Admin\Jamaah;

use Illuminate\Foundation\Http\FormRequest;

class TambahJamaahRequest extends FormRequest
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
        return [
            'nomor_transaksi' => 'required|unique:tbl_booking,id_transaksi|exists:tbl_payment,id',
            'nomor_paspor' => 'required|string',
            'nama' => 'required|string',
            'nama_pemesan' => 'required|string',
            'jenis_kelamin' => 'required|boolean',
            'nomor_hp' => 'required|numeric',
            'voucher' => 'nullable|exists:tbl_voucher,id_voucher|numeric',
            'status_pemesan' => 'required|boolean',
        ];
    }
}
