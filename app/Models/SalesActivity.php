<?php

namespace App\Models;

class SalesActivity extends CreatioModel
{
    protected $table = 'MdrSalesActivity';
    public $displayValue = 'MdrKodeBooking';

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class, 'MdrPipelineId', 'Id');
    }

    public function update_aktifitas()
    {
        return $this->belongsTo(StatusPipeline::class, 'MdrUpdateAktivitasId', 'Id');
    }
}
