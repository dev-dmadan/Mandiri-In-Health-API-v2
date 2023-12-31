<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestTrait;

class SalesActivityRequest extends FormRequest
{
    use RequestTrait;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->isMethod('POST')) {
            return $this->storeRules();
        }

        if($this->isMethod('PUT')) {
            return $this->updateRules();
        }

        return [];
    }

    public function attributes()
    {
        return [
            "MdrUpdateAktivitasId" => "UPDATE AKTIVITAS",
            "MdrPipelineId" => "PIPELINE",
            "MdrStatusAktivitas" => "STATUS AKTIVITAS",
            "MdrPerkiranClosing" => "PERKIRAAN CLOSING",
            "MdrCommitment" => "KOMITMEN",
            "MdrKeteranganProgres" => "KETERANGAN PROGRES"
        ];
    }

    private function storeRules()
    {
        return [
            "MdrUpdateAktivitasId" => 'required|uuid',
            "MdrCommitment" => 'nullable|boolean',
            "MdrKeteranganProgres" => 'required|string'
        ];
    }

    private function updateRules()
    {
        return [
            "MdrUpdateAktivitasId" => 'required|uuid',
            "MdrCommitment" => 'nullable|boolean',
            "MdrKeteranganProgres" => 'required|string'
        ];
    }
}
