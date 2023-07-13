<?php

namespace App\Models;

class Pipeline extends CreatioModel
{
    protected $table = 'MdrPipeline';
    public $displayValue = 'MdrName';

    public function KanalDistribusi()
    {
        return $this->belongsTo(Kanal::class, 'MdrKanalDistribusiId', 'Id');
    }

    public function InsuranceAgent()
    {
        return $this->belongsTo(Agent::class, 'MdrInsuranceAgentId', 'Id');
    }

    public function KaUnit()
    {
        return $this->belongsTo(KepalaUnit::class, 'MdrKaUnitId', 'Id');
    }

    public function KepalaKPM()
    {
        return $this->belongsTo(KepalaKanal::class, 'MdrKepalaKPMId', 'Id');
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'MdrProdukId', 'Id');
    }

    public function Status()
    {
        return $this->belongsTo(StatusPipeline::class, 'MdrStatusId', 'Id');
    }

    public function PolisStatus()
    {
        return $this->belongsTo(StatusPolis::class, 'MdrPolisStatusId', 'Id');
    }

    public function KategoriAsuransiEksisting()
    {
        return $this->belongsTo(KategoriAsuransiEksisting::class, 'MdrKategoriAsuransiEksistingId', 'Id');
    }

    public function AsuransiEksisting()
    {
        return $this->belongsTo(AsuransiEksisting::class, 'MdrAsuransiEksistingId', 'Id');
    }

    public function BrokerName()
    {
        return $this->belongsTo(Broker::class, 'MdrBrokerNameId', 'Id');
    }

    public function CoInsurance()
    {
        return $this->belongsTo(CoInsurance::class, 'MdrCoInsuranceId', 'Id');
    }

    public function Syariah()
    {
        return $this->belongsTo(Komitmen::class, 'MdrSyariahId', 'Id');
    }

    public function KepemilikanBU()
    {
        return $this->belongsTo(KepemilikanBU::class, 'MdrKepemilikanBUId', 'Id');
    }

    public function Provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'MdrProvinsiId', 'Id');
    }

    public function Kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'MdrKabupatenId', 'Id');
    }

    public function Kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'MdrKecamatanId', 'Id');
    }

    public function Kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'MdrKelurahanId', 'Id');
    }

    public function KodePosLookup()
    {
        return $this->belongsTo(KodePos::class, 'MdrKodePosLookupId', 'Id');
    }

    public function WilayahBadanUsaha()
    {
        return $this->belongsTo(WilayahBadanUsaha::class, 'MdrWilayahBadanUsahaId', 'Id');
    }

    public function SektorIndustri()
    {
        return $this->belongsTo(AccountIndustry::class, 'MdrSektorIndustriId', 'Id');
    }

    public function SinergiBankMandiri()
    {
        return $this->belongsTo(SinergiBankMandiri::class, 'MdrSinergiBankMandiriId', 'Id');
    }

    public function TerminBayar()
    {
        return $this->belongsTo(CaraBayar::class, 'MdrTerminBayarId', 'Id');
    }

    public function PerkiraanClosing()
    {
        return $this->belongsTo(MonthYear::class, 'MdrPerkiraanClosingId', 'Id');
    }

    public function Quotation()
    {
        return $this->belongsTo(Quotation::class, 'MdrQuotationId', 'Id');
    }

    public function UpdateAktifitas()
    {
        return $this->belongsTo(StatusPipeline::class, 'MdrUpdateAktifitasId', 'Id');
    }

    public function PKSType()
    {
        return $this->belongsTo(PKSType::class, 'MdrPKSTypeId', 'Id');
    }

    public function PaymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'MdrPaymentMethodId', 'Id');
    }

    public function RiwayatSalesActivity()
    {
        return $this->hasMany(HistorySalesActivity::class, 'MdrPipelineId', 'Id')->orderBy('MdrSeqNo', 'desc');
    }

    public function NamaBURenewal()
    {
        return $this->belongsTo(BadanUsaha::class, 'MdrNamaBURenewalId', 'Id');
    }
}
