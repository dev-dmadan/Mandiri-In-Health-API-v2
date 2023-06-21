<?php

namespace App\Models;

class SysAdminUnit extends CreatioModel
{
    protected $table = 'SysAdminUnit';
    public $displayValue = 'Name';

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'ContactId', 'Id');
    }
}
