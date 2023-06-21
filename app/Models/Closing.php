<?php

namespace App\Models;

class Closing extends CreatioModel
{
    protected $table = 'MdrClosing';
    public $displayValue = 'MdrName';

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class, 'MdrPipelineId', 'Id');
    }

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'MdrQuotationId', 'Id');
    }

    public function status()
    {
        return $this->belongsTo(StatusClosing::class, 'MdrClosingStatusId', 'Id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'MdrProductId', 'Id');
    }
}
