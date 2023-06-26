<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CreatioModel extends Model
{
    use HasFactory, HasUuids;

    const CREATED_AT = 'CreatedOn';
    const UPDATED_AT = 'ModifiedOn';

    public $incrementing = false;
    protected $keyType = 'string';

    public function getDisplayValue() 
    {
        return $this->{$this->displayValue};
    }

    public function CreatedBy()
    {
        return $this->belongsTo(Contact::class, 'CreatedById', 'Id');
    }

    public function ModifiedBy()
    {
        return $this->belongsTo(Contact::class, 'ModifiedById', 'Id');
    }
}