<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pegawai';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tgl_lahir',
        'alamat_lengkap',
        'departemen_id'
    ];
    protected $casts = [
        'tgl_lahir'     => 'date',
        'departemen_id' => 'integer'
    ];

    public function departemen(){
        return $this->belongsTo(Departemen::class, 'departemen_id', 'id');
    }
}
