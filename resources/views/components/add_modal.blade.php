<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/dashboard" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Parkir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="no_plat" class="form-label">No Plat</label>
                    <input type="text" class="form-control" id="no_plat" style="text-transform:uppercase" name="no_plat"/> 
                  </div>
                  <div class="mb-3">
                    <label for="merk_kendaraan" class="form-label">Merk Kendaraan</label>
                    <input type="text" class="form-control" id="merk_kendaraan" name="merk_kendaraan">
                  </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>