<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'master_kelurahan';
    protected $primaryKey ='id';
    protected $fillable = [
        'kecamatan_id',
        'kelurahan'
    ];
    public $timestamps = true;
}
