<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'master_kecamatan';
    protected $primaryKey ='id';
    protected $fillable = [
        'kota_id',
        'kecamatan'
    ];
    public $timestamps = true;
}
