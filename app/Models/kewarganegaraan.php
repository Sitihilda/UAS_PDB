<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kewarganegaraan extends Model
{
    use HasFactory;
    protected $table = 'kewarganegaraan';
    public $timestamps = false;

    public function penduduks()
    {
        return $this->hasMany('App\Models\penduduk');
    }

}

