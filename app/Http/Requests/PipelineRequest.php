<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PipelineRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            // Data Kanal
            'MdrKanalDistribusiId' => 'required|uuid',
            'MdrInsuranceAgentId' => 'required|uuid',
            'MdrEmailAgent' => 'required|string|email',
            'MdrKaUnitId' => 'required|uuid',
            'MdrKepalaKPMId' => 'required|uuid',
            'MdrKategoriAsuransiEksistingId' => 'required|uuid',
            'MdrAsuransiEksistingId' => 'required|uuid',
            'MdrBrokerNameId' => 'required|uuid',
            'MdrCoInsuranceId' => 'required|uuid',
            'MdrSyariahId' => 'nullable|uuid',

            // Data Badan Usaha
            'MdrName' => 'required|string',
            'MdrKepemilikanBUId' => 'required|uuid',
            'MdrNamaDireksi' => 'nullable|string',
            'MdrTanggalLahirDireksi' => 'nullable|date_format:Y-m-d',
            'MdrPICName' => 'nullable|string',
            'MdrNoTelp' => 'required|string',
            'MdrEmail' => 'nullable|string|email',
            'MdrKodePosLookupId' => 'required|uuid',
            'MdrKelurahanId' => 'required|uuid',
            'MdrKecamatanId' => 'required|uuid',
            'MdrKabupatenId' => 'required|uuid',
            'MdrProvinsiId' => 'required|uuid',
            'MdrAlamat' => 'required|string',
            'MdrWilayahBadanUsahaId' => 'required|uuid',
            'MdrProvinsiWilayahBU' => 'required|string',
            'MdrSektorIndustriId' => 'required|uuid',
            'MdrSinergiBankMandiriId' => 'required|uuid',
            'MdrKeteranganSinergiBankMandiri' => 'nullable|string',

            // Data Potensi Bisnis
            'MdrProdukId' => 'required|uuid',
            'MdrPolisStatusId' => 'required|uuid',
            'MdrJumlahPeserta' => 'required|numeric',
            'MdrTerminBayarId' => 'required|uuid',
            'MdrPremiDisetahunkan' => 'required|numeric',
            'MdrPerkiraanClosingId' => 'required|uuid',
            'MdrKomitmentAgen' => 'nullable|boolean',
            'MdrKomitmenKaUnit' => 'nullable|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'MdrKanalDistribusiId' => 'KANAL DISTRIBUSI',
            'MdrInsuranceAgentId' => 'AGENT',
            'MdrEmailAgent' => 'EMAIL AGENT',
            'MdrKaUnitId' => 'KA. UNIT',
            'MdrKepalaKPMId' => 'KA. KPM',
            'MdrKategoriAsuransiEksistingId' => 'KATEGORI ASURANSI EKSISTING',
            'MdrAsuransiEksistingId' => 'ASURANSI EKSISTING',
            'MdrBrokerNameId' => 'BROKER NAME',
            'MdrCoInsuranceId' => 'CO INSURANCE',
            'MdrSyariahId' => 'SYARIAH',
            'MdrName' => 'NAMA BU',
            'MdrKepemilikanBUId' => 'KEPEMILIKAN BU',
            'MdrNamaDireksi' => 'NAMA DIREKSI',
            'MdrTanggalLahirDireksi' => 'TANGGAL LAHIR DIREKSI',
            'MdrPICName' => 'PIC NAME',
            'MdrNoTelp' => 'NO. TELP',
            'MdrEmail' => 'EMAIL',
            'MdrKodePosLookupId' => 'KODE POS',
            'MdrKelurahanId' => 'KELURAHAN',
            'MdrKecamatanId' => 'KECAMATAN',
            'MdrKabupatenId' => 'KABUPATEN',
            'MdrProvinsiId' => 'PROVINSI',
            'MdrAlamat' => 'ALAMAT',
            'MdrWilayahBadanUsahaId' => 'WILAYAH BADAN USAHA',
            'MdrProvinsiWilayahBU' => 'PROVINSI WILAYAH BU',
            'MdrSektorIndustriId' => 'SEKTOR INDUSTRI',
            'MdrSinergiBankMandiriId' => 'SINERGI BANK MANDIRI',
            'MdrKeteranganSinergiBankMandiri' => 'KETERANGAN SINERGI BANK MANDIRI',
            'MdrProdukId' => 'PRODUK',
            'MdrPolisStatusId' => 'POLIS STATUS',
            'MdrJumlahPeserta' => 'JUMLAH PESERTA',
            'MdrTerminBayarId' => 'TERMIN BAYAR',
            'MdrPremiDisetahunkan' => 'PREMI DISETAHUNKAN',
            'MdrPerkiraanClosingId' => 'PERKIRAAN CLOSING',
            'MdrKomitmentAgen' => 'KOMITMEN',
            'MdrKomitmenKaUnit' => 'KOMITMEN KA. UNIT',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'success' => false,
            'message' => 'Harap cek kembali form',
            'error' => $validator->errors(),
        ];
        
        throw new HttpResponseException(response()->json($response, 422));
    }
}
