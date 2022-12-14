<?php

namespace App\Http\Controllers;

use App\Models\KendaraanKeluar;
use App\Models\KendaraanMasuk;
use Illuminate\Http\Request;

class KendaraanKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.arsip', [
            'kendaraan' => KendaraanKeluar::orderBy("created_at", "desc")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KendaraanKeluar  $kendaraanKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(KendaraanKeluar $kendaraanKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KendaraanKeluar  $kendaraanKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(KendaraanKeluar $kendaraanKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KendaraanKeluar  $kendaraanKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KendaraanKeluar $kendaraanKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KendaraanKeluar  $kendaraanKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KendaraanKeluar::find($id);
        $data->delete();
        return view('dashboard.arsip', ['kendaraan' => KendaraanKeluar::all()])->with('Succes', 'Data Berhasil Dihapus');
    }
}