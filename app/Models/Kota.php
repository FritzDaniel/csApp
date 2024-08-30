<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'master_kota';
    protected $primaryKey ='id';
    protected $fillable = [
        'provinsi_id',
        'kota'
    ];
    public $timestamps = true;
}
