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
}
