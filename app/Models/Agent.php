<?php

namespace App\Models;

class Agent extends CreatioModel
{
    protected $table = 'MdrAgent';
    public $displayValue = 'MdrName';

    public function Kanal()
    {
        return $this->belongsTo(Kanal::class, 'MdrKanalId', 'Id');
    }

    public function LNAMAAGEN()
    {
        return $this->hasOne(Contact::class, 'MdrLNAMAAGENId', 'Id');
    }
}
