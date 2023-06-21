<?php

namespace App\Models;

class Quotation extends CreatioModel
{    
    protected $table = 'MdrQuotation';
    public $displayValue = 'MdrName';

    public function kanal()
    {
        return $this->belongsTo(Kanal::class, 'MdrKanalDistribusiId', 'Id');
    }

    public function badan_usaha()
    {
        return $this->belongsTo(Pipeline::class, 'MdrBUNameId', 'Id');
    }

    public function status()
    {
        return $this->belongsTo(StatusQuotation::class, 'MdrQuotationStatusId', 'Id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'MdrAgentNameId', 'Id');
    }

    public function kepala_unit()
    {
        return $this->belongsTo(KepalaUnit::class, 'MdrKAUNITId', 'Id');
    }

    public function kepala_kanal()
    {
        return $this->belongsTo(KepalaKanal::class, 'MdrKepalaKanalId', 'Id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'MdrProductId', 'Id');
    }

    public function skema_produk()
    {
        return $this->belongsTo(SkemaProduk::class, 'MdrSkemaProductId', 'Id');
    }

    public function tujuan_klaim_reimburse_pengajuan() 
    {
        return $this->belongsTo(TujuanKlaimReimburse::class, 'MdrTujuanKlaimReimbursePengajuanId', 'Id');
    }

    public function tujuan_klaim_reimburse_disetujui() 
    {
        return $this->belongsTo(TujuanKlaimReimburse::class, 'MdrTujuanKlaimReimburseDiSetujuiId', 'Id');
    }

    public function installment()
    {
        return $this->hasMany(QuotationInstallment::class, 'MdrQuotationId', 'Id');
    }
}