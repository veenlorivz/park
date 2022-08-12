<?php

namespace App\Http\Controllers;

use App\Models\park;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.index");
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
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function show(park $park)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function edit(park $park)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, park $park)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function destroy(park $park)
    {
        //
    }
}
