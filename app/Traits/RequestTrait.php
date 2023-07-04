<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait RequestTrait {

    public function messages()
    {
        return [
            'required' => ':attribute WAJIB DIISI',
            'uuid' => ':attribute HARUS BERUPA GUID',
            'max' => ':attribute MAKSIMAL :max',
            'min' => ':attribute MINIMAL :min',
            'numeric' => ':attribute HARUS BERUPA ANGKA',
            'date_format' => 'FORMAT :attribute TIDAK SESUAI (yyyy-mm-dd)',
            'between' => ':attribute MINIMAL :min DAN MAKSIMAL :max',
            'array' => ':attribute HARUS DALAM BENTUK LIST / ARRAY',
            'gt' => ':attribute HARUS LEBIH BESAR DARI :value'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->messages();
        $errorList = [];
        foreach ($errors as $key => $value) {
            $errorList[] = [
                'name' => $key,
                'message' => implode(", ", $value)
            ];
        }

        $response = [
            'success' => false,
            'message' => 'HARAP CEK KEMBALI FORM',
            'error' => $errorList,
        ];
        
        throw new HttpResponseException(response()->json($response, 422));
    }

}