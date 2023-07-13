<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorySalesActivity extends CreatioModel
{
    protected $table = 'MdrHistorySalesActivity';
    public $displayValue = 'MdrName';

    public function Pipeline()
    {
        return $this->belongsTo(Pipeline::class, 'MdrPipelineId', 'Id');
    }

    public function UpdateAktivitas()
    {
        return $this->belongsTo(StatusPipeline::class, 'MdrUpdateAktivitasId', 'Id');
    }
}