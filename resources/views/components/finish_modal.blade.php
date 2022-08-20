<div class="modal fade" id="modalSelesai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/dashboard/parkir/finish" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Parkir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body finish-modal">
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
<script type="text/javascript">
    const getDataModal = (data) => {
        // const tanggal_masuk = data.created_at.split("T")[0]
        const tanggal_masuk = new Date(data.created_at).toLocaleDateString().split('/')
        const waktu_masuk = new Date(data.created_at).toLocaleTimeString("id-id").split(".").join(":")
        const tanggal_keluar = new Date().toLocaleDateString("").split("/");
        const waktu_keluar = new Date().toLocaleTimeString("id-id").split(" ")[0].split('.').join(":");
        const total_harga = intToRupiah(getTotalHarga(new Date(data.created_at), new Date()))
        console.log(waktu_keluar)
        // const total_waktu = getTotalWaktu(new Date(data.created_at.split(".")[0].split("T").join(",")), new Date());
        const total_waktu = getTotalWaktu(new Date(data.created_at), new Date());
        document.querySelector("#no_plat").value = `${data.no_plat}`
        document.querySelector("#merk").value = `${data.merk_kendaraan}`
        document.querySelector("#masuk").value = `${tanggal_masuk[2]}-${tanggal_masuk[0]}-${tanggal_masuk[1]} ${waktu_masuk}`
        document.querySelector("#keluar").value =`${tanggal_keluar[2]}-${tanggal_keluar[0]}-${tanggal_keluar[1]} ${waktu_keluar}`
        total_waktu === 0 ? document.querySelector("#total_waktu").value = `Tidak Sampai 1 Jam` : document.querySelector("#total_waktu").value = `${total_waktu} Jam`
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