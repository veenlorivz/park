@extends('layout')

@section('title')
    Dashboard
@endsection

@section('index', 'active')

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
            <h1 class="h2">Kendaraan Terparkir</h1>
        </div>
        <div class="row mb-2">
            <div class="col-lg-4">
                <form class="input-group mb-3 shadow" method="POST" action="/dashboard/parkir/search">
                    @csrf
                    @method('POST')
                    <input type="text" class="form-control" placeholder="Cari No Plat" aria-label="Recipient's username"
                        aria-describedby="basic-addon2" name="search">
                    <button class="input-group-text" id="basic-addon2" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($kendaraan as $index => $k)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card shadow">
                        <div class="card-header fs-5">
                            {{ $k->no_plat }}
                        </div>
                        <div class="card-body">
                            <p class="card-title">Merk Motor : {{ $k->merk_kendaraan }} </p>
                            <p class="card-title mb-3">Waktu Masuk :
                                {{ date('Y m, d, H:i s', strtotime($k->created_at)) }}
                            </p>
                            <button data-bs-toggle="modal" data-bs-target="#modalSelesai" class="btn btn-success"
                                onclick="getDataModal( {{ $k }})">Selesai</button>
                        </div>
                    </div>
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
                                        :&nbsp; <input type="text" readonly class="form-control-plaintext" id="no_plat"
                                            name="no_plat">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Merek kendaraan</label>
                                    <div class="col-sm-8 d-flex flex-row align-items-center">
                                        :&nbsp; <input type="text" readonly class="form-control-plaintext" id="merk"
                                            name="merk_kendaraan">
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
                                        :&nbsp; <input type="text" readonly class="form-control-plaintext" value="2000"
                                            name="harga">
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
                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit">Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <script type="text/javascript">
        const getDataModal = (data) => {
            const tanggal_masuk = data.created_at.split("T")[0]
            const waktu_masuk = data.created_at.split("T")[1].split(".")[0]
            const tanggal_keluar = new Date().toLocaleDateString("id-id").split("/");
            const waktu_keluar = new Date().toLocaleTimeString("id-id").split(" ")[0];
            const total_harga = intToRupiah(getTotalHarga(new Date(data.created_at.split(".")[0].split("T").join(",")),
                new Date()))
            const total_waktu = getTotalWaktu(new Date(data.created_at.split(".")[0].split("T").join(",")), new Date());
            document.querySelector("#no_plat").value = `${data.no_plat}`
            document.querySelector("#merk").value = `${data.merk_kendaraan}`
            document.querySelector("#masuk").value = `${tanggal_masuk} ${waktu_masuk}`
            document.querySelector("#keluar").value = `${tanggal_masuk} ${waktu_masuk}`
            total_waktu === 0 ? document.querySelector("#total_waktu").value = `Tidak Sampai 1 Jam` : document
                .querySelector("#total_waktu").value = `${total_waktu} Jam`
            document.querySelector("#total_harga").value = `${total_harga}`
        }

        const getTotalHarga = (masuk, keluar) => {
            const selisih = keluar.getTime() - masuk.getTime()
            const total_harga = Math.round(selisih / 3600 * 2)
            if (total_harga < 2000) return 2000
            return total_harga
        }

        const getTotalWaktu = (masuk, keluar) => {
            return Math.round((keluar.getTime() - masuk.getTime()) / 3600000)
        }

        const intToRupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }
    </script>
@endsection
