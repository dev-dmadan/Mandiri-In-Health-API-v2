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
        return $this->belongsTo(KategoriAsuransiEksisting::class, 'MdrAsuransiEkistingId', 'Id');
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

    // buat model baru
    public function TipeProses()
    {
        return $this->belongsTo(TipeProses::class, 'MdrTipeProsesId', 'Id');
    }

    // buat model baru
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
}
