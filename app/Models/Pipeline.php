<?php

namespace App\Models;

class Pipeline extends CreatioModel
{
    protected $table = 'MdrPipeline';
    public $displayValue = 'MdrName';

    public function kanal()
    {
        return $this->belongsTo(Kanal::class, 'MdrKanalDistribusiId', 'Id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'MdrInsuranceAgentId', 'Id');
    }

    public function kepala_unit()
    {
        return $this->belongsTo(KepalaUnit::class, 'MdrKaUnitId', 'Id');
    }

    public function kepala_kanal()
    {
        return $this->belongsTo(KepalaKanal::class, 'MdrKepalaKPMId', 'Id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'MdrProdukId', 'Id');
    }

    public function status()
    {
        return $this->belongsTo(StatusPipeline::class, 'MdrStatusId', 'Id');
    }

    public function status_polis()
    {
        return $this->belongsTo(StatusPolis::class, 'MdrPolisStatusId', 'Id');
    }

    public function kategori_asuransi_eksisting()
    {
        return $this->belongsTo(KategoriAsuransiEksisting::class, 'MdrKategoriAsuransiEksistingId', 'Id');
    }

    public function asuransi_eksisting()
    {
        return $this->belongsTo(AsuransiEksisting::class, 'MdrAsuransiEksistingId', 'Id');
    }

    public function broker()
    {
        return $this->belongsTo(Broker::class, 'MdrBrokerNameId', 'Id');
    }

    public function co_insurance()
    {
        return $this->belongsTo(CoInsurance::class, 'MdrCoInsuranceId', 'Id');
    }

    public function syariah()
    {
        return $this->belongsTo(Komitmen::class, 'MdrSyariahId', 'Id');
    }

    public function kepemilikan_bu()
    {
        return $this->belongsTo(KepemilikanBU::class, 'MdrKepemilikanBUId', 'Id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'MdrProvinsiId', 'Id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'MdrKabupatenId', 'Id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'MdrKecamatanId', 'Id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'MdrKelurahanId', 'Id');
    }

    public function kode_pos()
    {
        return $this->belongsTo(KodePos::class, 'MdrKodePosLookupId', 'Id');
    }

    public function wilayah_badan_usaha()
    {
        return $this->belongsTo(WilayahBadanUsaha::class, 'MdrWilayahBadanUsahaId', 'Id');
    }

    public function sektor_industri()
    {
        return $this->belongsTo(AccountIndustry::class, 'MdrSektorIndustriId', 'Id');
    }

    public function sinergi_bank_mandiri()
    {
        return $this->belongsTo(SinergiBankMandiri::class, 'MdrSinergiBankMandiriId', 'Id');
    }

    public function termin_bayar()
    {
        return $this->belongsTo(CaraBayar::class, 'MdrTerminBayarId', 'Id');
    }

    public function perkiraan_closing()
    {
        return $this->belongsTo(MonthYear::class, 'MdrPerkiraanClosingId', 'Id');
    }

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'MdrQuotationId', 'Id');
    }

    public function update_aktifitas()
    {
        return $this->belongsTo(StatusPipeline::class, 'MdrUpdateAktifitasId', 'Id');
    }
}
