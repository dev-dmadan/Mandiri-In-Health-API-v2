<?php

namespace App\Models;

class Quotation extends CreatioModel
{    
    protected $table = 'MdrQuotation';
    public $displayValue = 'MdrName';

    public function KanalDistribusi()
    {
        return $this->belongsTo(Kanal::class, 'MdrKanalDistribusiId', 'Id');
    }

    public function BUName()
    {
        return $this->belongsTo(Pipeline::class, 'MdrBUNameId', 'Id');
    }

    public function QuotationStatus()
    {
        return $this->belongsTo(StatusQuotation::class, 'MdrQuotationStatusId', 'Id');
    }

    public function AgentName()
    {
        return $this->belongsTo(Agent::class, 'MdrAgentNameId', 'Id');
    }

    public function KAUNIT()
    {
        return $this->belongsTo(KepalaUnit::class, 'MdrKAUNITId', 'Id');
    }

    public function KepalaKanal()
    {
        return $this->belongsTo(KepalaKanal::class, 'MdrKepalaKanalId', 'Id');
    }

    public function Product()
    {
        return $this->belongsTo(Produk::class, 'MdrProductId', 'Id');
    }

    public function SkemaProduct()
    {
        return $this->belongsTo(SkemaProduk::class, 'MdrSkemaProductId', 'Id');
    }

    public function TujuanKlaimReimbursePengajuan() 
    {
        return $this->belongsTo(TujuanKlaimReimburse::class, 'MdrTujuanKlaimReimbursePengajuanId', 'Id');
    }

    public function TujuanKlaimReimburseDiSetujui() 
    {
        return $this->belongsTo(TujuanKlaimReimburse::class, 'MdrTujuanKlaimReimburseDiSetujuiId', 'Id');
    }

    public function installment()
    {
        return $this->hasMany(QuotationInstallment::class, 'MdrQuotationId', 'Id');
    }
}