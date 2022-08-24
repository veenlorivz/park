@extends('layouts.dashboard')

@section('title')
    Dashboard | Arsip
@endsection

@section('arsip', 'active')

@section('css')
    <style>
        main {
            font-family: "Roboto", sans-serif;
        }

        .modal-body input {
            border: none;
            outline: none;
        }
    </style>
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Arsip Kendaraan</h1>
        </div>
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>No_Plat</th>
                                    <th>Merk Kendaraan</th>
                                    <th>Waktu Keluar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kendaraan as $k)
                                    <tr>
                                        <td>{{ $k->no_plat }}</td>
                                        <td>{{ $k->merk_kendaraan }}</td>
                                        <td>{{ date('Y-m-d, H:i:s', strtotime($k->waktu_keluar)) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button data-bs-toggle="modal" data-bs-target="#modalSelesai"
                                                    class="btn btn-warning"
                                                    onclick="getDataArsipModal( {{ $k }})">Detail</button>
                                                <form action="/dashboard/arsip/{{ $k->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-danger mx-1 text-decoration-none">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="modalSelesai" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content" action="/dashboard/parkir/finish" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data Parkir</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2 row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Plat</label>
                                        <div class="col-sm-8 d-flex flex-row align-items-center">
                                            :&nbsp; <input type="text" readonly class="form-control-plaintext"
                                                id="no_plat" name="no_plat">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Merek kendaraan</label>
                                        <div class="col-sm-8 d-flex flex-row align-items-center">
                                            :&nbsp; <input type="text" readonly class="form-control-plaintext"
                                                id="merk" name="merk_kendaraan">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
                                        <div class="col-sm-8 d-flex flex-row align-items-center">
                                            :&nbsp; <input type="datetime" readonly class="form-control-plaintext"
                                                id="masuk" name="waktu_masuk">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Keluar</label>
                                        <div class="col-sm-8 d-flex flex-row align-items-center">
                                            :&nbsp; <input type="datetime" readonly class="form-control-plaintext"
                                                id="keluar" name="waktu_keluar">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Harga Per jam</label>
                                        <div class="col-sm-8 d-flex flex-row align-items-center">
                                            :&nbsp; <input type="text" readonly class="form-control-plaintext"
                                                value="2000" name="harga">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Total Waktu</label>
                                        <div class="col-sm-8 d-flex flex-row align-items-center">
                                            :&nbsp; <input type="text" readonly class="form-control-plaintext"
                                                id="total_waktu" name="total_waktu">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Total Harga</label>
                                        <div class="col-sm-8 d-flex flex-row align-items-center">
                                            :&nbsp; <input type="text" readonly class="form-control-plaintext"
                                                id="total_harga" name="total_harga">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <script type="text/javascript">
        const getDataArsipModal = (data) => {
            document.querySelector("#no_plat").value = `${data.no_plat}`
            document.querySelector("#merk").value = `${data.merk_kendaraan}`
            document.querySelector("#masuk").value = `${data.waktu_masuk}`
            document.querySelector("#keluar").value = `${data.waktu_keluar}`
            document.querySelector("#total_waktu").value = `${data.total_waktu}`
            document.querySelector("#total_harga").value = `${data.total_harga}`
        }
    </script>
@endsection
