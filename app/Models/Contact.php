<?php

namespace App\Models;

class Contact extends CreatioModel
{    
    protected $table = 'Contact';
    public $displayValue = 'Name';

    public function kanal()
    {
        return $this->belongsTo(Kanal::class, 'MdrLKANALDISTRIBUSIId', 'Id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'MdrLNAMAAGENId', 'Id');
    }

    public function type()
    {
        return $this->belongsTo(ContactType::class, 'TypeId', 'Id');
    }

    public function user()
    {
        return $this->hasOne(SysAdminUnit::class, 'ContactId', 'Id');
    }
}
