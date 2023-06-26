<?php

namespace App\Models;

class Closing extends CreatioModel
{
    protected $table = 'MdrClosing';
    public $displayValue = 'MdrName';

    public function Pipeline()
    {
        return $this->belongsTo(Pipeline::class, 'MdrPipelineId', 'Id');
    }

    public function Quotation()
    {
        return $this->belongsTo(Quotation::class, 'MdrQuotationId', 'Id');
    }

    public function ClosingStatus()
    {
        return $this->belongsTo(StatusClosing::class, 'MdrClosingStatusId', 'Id');
    }

    public function Product()
    {
        return $this->belongsTo(Produk::class, 'MdrProductId', 'Id');
    }
}
