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

    public function Title()
    {
        return $this->belongsTo(Saluation::class, 'MdrTitleId', 'Id');
    }

    public function CaraBayar()
    {
        return $this->belongsTo(CaraBayar::class, 'MdrCaraBayarId', 'Id');
    }

    public function SLAPembayaranPremPengajuan()
    {
        return $this->belongsTo(SLAPembayaranPengajuan::class, 'MdrSLAPembayaranPremPengajuanId', 'Id');
    }

    public function SLABayarKlaimReimburse()
    {
        return $this->belongsTo(SLABayarKlaimReimburse::class, 'MdrSLABayarKlaimReimburseId', 'Id');
    }

    public function KadaluarsaKlaim()
    {
        return $this->belongsTo(KadaluarsaKlaimReimburse::class, 'MdrKadaluarsaKlaimId', 'Id');
    }

    public function KadaluarsaReKlaim()
    {
        return $this->belongsTo(KadaluarsaReKlaimReimburse::class, 'MdrKadaluarsaReKlaimId', 'Id');
    }

    public function MaxUsiaAnakPengajuan()
    {
        return $this->belongsTo(UsiaAnak::class, 'MdrMaxUsiaAnakPengajuanId', 'Id');
    }

    public function BackdatedMutasiPeserta()
    {
        return $this->belongsTo(BackdatedMutasiPeserta::class, 'MdrBackdatedMutasiPesertaId', 'Id');
    }

    public function PreExistingCondition()
    {
        return $this->belongsTo(PreExistingCondition::class, 'MdrPreExistingConditionId', 'Id');
    }

    public function RefundPremi()
    {
        return $this->belongsTo(RefundPremi::class, 'MdrRefundPremiId', 'Id');
    }

    public function ASOType()
    {
        return $this->belongsTo(ASOType::class, 'MdrASOTypeId', 'Id');
    }

    public function Plan()
    {
        return $this->belongsTo(SetupIndemnity::class, 'MdrPlanId', 'Id');
    }

    public function Installment()
    {
        return $this->hasMany(QuotationInstallment::class, 'MdrQuotationId', 'Id');
    }
}