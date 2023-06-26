<?php

namespace App\Models;

class Contact extends CreatioModel
{    
    protected $table = 'Contact';
    public $displayValue = 'Name';

    public function KANALDISTRIBUSI()
    {
        return $this->belongsTo(Kanal::class, 'MdrLKANALDISTRIBUSIId', 'Id');
    }

    public function LNAMAAGEN()
    {
        return $this->belongsTo(Agent::class, 'MdrLNAMAAGENId', 'Id');
    }

    public function Type()
    {
        return $this->belongsTo(ContactType::class, 'TypeId', 'Id');
    }

    public function User()
    {
        return $this->hasOne(SysAdminUnit::class, 'ContactId', 'Id');
    }
}
