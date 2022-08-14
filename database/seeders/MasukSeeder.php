<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KendaraanMasuk;

class MasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set("Asia/Jakarta");
        
        $kendaraanMasuk = [
            [
                "no_plat" => "B3122PPS",
                "merk_kendaraan" => "Honda CBR 150",
            ],
            [
                "no_plat" => "B5559TWA",
                "merk_kendaraan" => "Honda R15",
            ],
            [
                "no_plat" => "D3215TTS",
                "merk_kendaraan" => "Honda Vario 125",
            ],
            [
                "no_plat" => "B5552SWA",
                "merk_kendaraan" => "Yamaha XSR",
            ],
            [
                "no_plat" => "B1112TWU",
                "merk_kendaraan" => "Yamaha Mio Soul GT",
            ],
            [
                "no_plat" => "B5891PSU",
                "merk_kendaraan" => "Suzuki Ninja 150",
            ],
        ];

        foreach ($kendaraanMasuk as $kendaraan ) {
            KendaraanMasuk::create($kendaraan);
        }
    }
}
