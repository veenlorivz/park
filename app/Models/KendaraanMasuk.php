<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanMasuk extends Model
{
    use HasFactory;
    protected $table = 'kendaraan_masuk';
    protected $guarded = [''];
}
