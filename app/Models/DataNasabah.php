<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\User;

class DataNasabah extends Model
{
    use HasFactory;

    protected $table = 'data_nasabah';
    protected $primaryKey ='id';
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'nama_jalan',
        'rt',
        'rw',
        'nominal_setor',
        'created_by',
        'status'
    ];
    public $timestamps = true;

    public function Provinsi()
    {
        return $this->belongsTo(Provinsi::class,'provinsi');
    }

    public function Kota()
    {
        return $this->belongsTo(Kota::class,'kota');
    }

    public function Kecamatan()
    {
        return $this->belongsTo(Kecamatan::class,'kecamatan');
    }

    public function Kelurahan()
    {
        return $this->belongsTo(Kelurahan::class,'kelurahan');
    }

    public function User() 
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
