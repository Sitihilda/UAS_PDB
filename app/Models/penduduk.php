<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penduduk extends Model
{
    use HasFactory;
protected $table = 'penduduk';

    public function kewarganegaraan()
    {
        return $this->belongsTo('App\Models\kewarganegaraan');
    }

    public function pekerjaan()
    {
        return $this->belongsTo('App\Models\pekerjaan');
    }

    public function level_pendidikan()
    {
        return $this->belongsTo('App\Models\level_pendidikan');
    }

    public function kartu_keluarga()
    {
        return $this->belongsTo('App\Models\kartu_keluarga');
    }

    protected $fillable = ['kartu_keluarga_id', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'agama', 'jenis_kelamin', 'level_pendidikan_id', 'pekerjaan_id', 'status_pernikahan', 'status_keluarga', 'kewarganegaraan_id', 'ayah', 'ibu'];
}

