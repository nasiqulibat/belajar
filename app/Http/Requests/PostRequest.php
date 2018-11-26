<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class DataPemdaFormRequest
 * @package App\Http\Requests\DataUmum
 */
class PostRequest extends Request
{

    /**
     * @var array
     */
    protected $attrs = [
        'nama'  => 'Nama',
        'tgl'  => 'Tanggal',
        'email'    => 'Email',
        'telp'    => 'Telp',
        'jk'   => 'JK',
        'alamat'  => 'Alamat',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'tgl'    => 'required',
            'telp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'jk' => 'required',
        ];
    }

    /**
     * @param $validator
     * @return mixed
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Harus diisi semua');
            }
        });
    }

    /**
     * @param Validator $validator
     * @return array
     */

}
