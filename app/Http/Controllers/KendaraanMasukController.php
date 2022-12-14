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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kendaraaan;

        if($request->search){
            $kendaraan =  KendaraanMasuk::where("no_plat", 'like', "%" . $request->search . "%")->paginate(5);
        }else{
            $kendaraan = KendaraanMasuk::orderBy("created_at", "DESC")->get();
        }
        return view("dashboard.index", [
            "kendaraan" =>$kendaraan,
            "search" => $request->search ? $request->search : ""
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KendaraanMasuk::create([
            "no_plat" => strtoupper($request->no_plat),
            "merk_kendaraan" => $request->merk_kendaraan
        ]);

        return redirect("/dashboard");
    }

    /**
     * Store a finished vehicle park resource in kendaraan_masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request)
    {
        KendaraanMasuk::where("no_plat", $request->no_plat)->delete();
        KendaraanKeluar::create($request->all());
        return redirect("/dashboard");
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

        $kendaraan = KendaraanMasuk::orderBy("created_at", "DESC")->get();

        if($request->keyword != ''){
            $kendaraan = Employee::where('no_plat','LIKE','%'.$request->keyword.'%')->get();
        }
        return response()->json([
           'kendaraan' => $kendaraan
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