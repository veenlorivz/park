@extends('layouts.dashboard')

@section('title')
    Dashboard | Home
@endsection

@section('index', 'active')

@section('css')
    <style>
        main {
            font-family: "Roboto", sans-serif;
        }

        .finish-modal input {
            border: none;
            outline: none;
        }

        .bi-plus {
            font-size: 32px;
            transform: translateY(-15%);
            cursor: pointer;
        }

        .bi-arrow-clockwise {
            outline: none;
            border: none;
            margin-left: 10px;
            transform: translateY(-20%);
            background-color: transparent;
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Kendaraan Terparkir</h1>
        </div>
        <div class="row mb-2">
            <div class="col-lg-5 d-flex flex-row align-items-center">
                <form class="input-group mb-3 shadow" method="GET" action="/dashboard/">
                    <input type="text" class="form-control" placeholder="Cari No Plat" aria-label="Recipient's username"
                        aria-describedby="basic-addon2" name="search" id="search" value="{{ $search }}">
                    <button class="input-group-text" id="basic-addon2" type="submit"><i class="bi bi-search"></i></button>
                </form>
                @if ($search)
                    <form action="/dashboard" method="GET" class="form-search">
                        <button class="bi bi-arrow-clockwise"></button>
                    </form>
                @endif
                <i class="bi bi-plus" data-bs-toggle="modal" data-bs-target="#modalTambah"></i>
            </div>
        </div>
        <div class="row">
            @forelse ($kendaraan as $index => $k)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card shadow">
                        <div class="card-header fs-5">
                            {{ $k->no_plat }}
                        </div>
                        <div class="card-body">
                            <p class="card-title">Merk Motor : {{ $k->merk_kendaraan }} </p>
                            <p class="card-title mb-3">Waktu Masuk :
                                {{ date('Y m d, H:i s', strtotime($k->created_at)) }}
                            </p>
                            <button data-bs-toggle="modal" data-bs-target="#modalSelesai" class="btn btn-success"
                                onclick="getDataModal( {{ $k }})">Selesai</button>
                        </div>
                    </div>
                </div>
            @empty
                @if ($search)
                    <p class="text-muted fs-5 mt-3 fw-light">Tidak ada yang parkir dengan no_plat "{{ $search }}"</p>
                @else
                    <p class="text-muted fs-5 mt-3 fw-light">Tidak ada yang parkir saat ini</p>
                @endif
            @endforelse
            @include('components.finish_modal')
            @include('components.add_modal')
        </div>
    </main>
@endsection
