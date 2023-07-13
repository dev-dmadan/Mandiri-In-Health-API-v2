<?php

namespace App\Models;

class SalesActivity extends CreatioModel
{
    protected $table = 'MdrSalesActivity';
    public $displayValue = 'MdrKodeBooking';

    public function Pipeline()
    {
        return $this->belongsTo(Pipeline::class, 'MdrPipelineId', 'Id');
    }

    public function UpdateAktivitas()
    {
        return $this->belongsTo(StatusPipeline::class, 'MdrUpdateAktivitasId', 'Id');
    }

    public function KanalDistribusi()
    {
        return $this->belongsTo(Kanal::class, 'MdrKanalDistribusiId', 'Id');
    }

    public function NamaBadanUsaha()
    {
        return $this->belongsTo(Pipeline::class, 'MdrNamaBadanUsahaId', 'Id');
    }

    public function KategoriAsuransiEksisting()
    {
        return $this->belongsTo(KategoriAsuransiEksisting::class, 'MdrKategoriAsuransiEksistingId', 'Id');
    }

    public function AsuransiEkisting()
    {
        return $this->belongsTo(KategoriAsuransiEksisting::class, 'MdrAsuransiEkisitingId', 'Id');
    }

    public function SinergiBankMandiri()
    {
        return $this->belongsTo(SinergiBankMandiri::class, 'MdrSinergiBankMandiriId', 'Id');
    }

    public function KepalaUnit()
    {
        return $this->belongsTo(KepalaUnit::class, 'MdrKepalaUnitId', 'Id');
    }

    public function AgenAsuransi()
    {
        return $this->belongsTo(Agent::class, 'MdrAgenAsuransiId', 'Id');
    }

    public function NamaBroker()
    {
        return $this->belongsTo(Broker::class, 'MdrNamaBrokerId', 'Id');
    }

    public function TipeProses()
    {
        return $this->belongsTo(TipeProses::class, 'MdrTipeProsesId', 'Id');
    }

    public function ProdukAsuransiSebelumnya()
    {
        return $this->belongsTo(ProdukAsuransiSebelumnya::class, 'MdrProdukAsuransiSebelumnyaId', 'Id');
    }

    public function KategoriAsuransiKompetitor()
    {
        return $this->belongsTo(KategoriAsuransiEksisting::class, 'MdrKategoriAsuransiKompetitorId', 'Id');
    }

    public function ProdukDitawarkan()
    {
        return $this->belongsTo(Produk::class, 'MdrProdukDitawarkanId', 'Id');
    }

    public function AsuransiKompetitor()
    {
        return $this->belongsTo(AsuransiEksisting::class, 'MdrAsuransiKompetitorId', 'Id');
    }

    public function KategoriAsuransiPemenang()
    {
        return $this->belongsTo(KategoriAsuransiEksisting::class, 'MdrKategoriAsuransiPemenangId', 'Id');
    }

    public function AsuransiPemenang()
    {
        return $this->belongsTo(AsuransiEksisting::class, 'MdrAsuransiPemenangId', 'Id');
    }

    public function KategoriLoss1()
    {
        return $this->belongsTo(KategoriAlasanLoss1::class, 'MdrKategoriLoss1Id', 'Id');
    }

    public function KategoriLoss2()
    {
        return $this->belongsTo(KategoriAlasanLoss2::class, 'MdrKategoriLoss2Id', 'Id');
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'MdrProdukId', 'Id');
    }

    public function KategoriLapse1()
    {
        return $this->belongsTo(KategoriAlasanLapse1::class, 'MdrKategoriLapse1Id', 'Id');
    }

    public function KategoriLapse2()
    {
        return $this->belongsTo(KategoriAlasanLapse2::class, 'MdrKategoriLapse2Id', 'Id');
    }
}
