@extends('layout')  

@section('title') Dashboard @endsection

@section('css')
    <style>
        main{
            font-family: "Roboto", sans-serif;
        }
    </style>
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Kendaraan Terparkir</h1>
        </div>
        <div class="row mb-2">
            <div class="col-9 mx-auto">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari No Plat" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header fs-5">
                          B564PGI
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Merk Motor : Supra MX 125 </h5>
                          <h5 class="card-title mb-3">Waktu Masuk : 08:45 </h5>
                          <a href="#" class="btn btn-success">Selesai</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </main>
@endsection
