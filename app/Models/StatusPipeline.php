<?php

namespace App\Models;

class StatusPipeline extends CreatioModel
{
    protected $table = 'MdrPipelineStatus';
    public $displayValue = 'Name';

    public function PolisStatus()
    {
        return $this->belongsTo(StatusPolis::class, 'MdrPolisStatusId', 'Id');
    }
}
