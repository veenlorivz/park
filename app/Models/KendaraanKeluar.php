<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanKeluar extends Model
{
    use HasFactory;
    protected $table = 'kendaraan_keluar';
    protected $guarded = [''];
}
