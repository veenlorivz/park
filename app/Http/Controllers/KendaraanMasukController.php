<?php

namespace App\Http\Controllers;

use App\Models\KendaraanMasuk;
use App\Models\KendaraanKeluar;
use Illuminate\Http\Request;

class KendaraanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.index", [
            "kendaraan" => KendaraanMasuk::all()
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
     * Store a finished vehicle park resource in kendaraan_masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request)
    {   
        KendaraanKeluar::create($request->all());
        KendaraanMasuk::where("no_plat", $request->no_plat)->delete();
        return redirect("/dashboard/parkir");
    }

    /**
     * Search vehicle based on register plate.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   
        
        $kendaraan = KendaraanMasuk::where("no_plat", 'like', "%" . $request->search . "%")->paginate(5);
        return view("dashboard.index", [
            "kendaraan" => $kendaraan
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(KendaraanMasuk $kendaraanMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(KendaraanMasuk $kendaraanMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KendaraanMasuk $kendaraanMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KendaraanMasuk  $kendaraanMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(KendaraanMasuk $kendaraanMasuk)
    {
        //
    }
}
