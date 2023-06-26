<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeTest extends Model
{
    use HasFactory;

    protected $table = 'tree_test';
    protected $primaryKey = 'Id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function children()
    {
        return $this->hasMany(TreeTest::class, 'ParentId', 'Id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }
}
