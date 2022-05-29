<p style="font-size: 20px;">
    <b>Jadwal Kelompok Tani</b>
</p>
<hr>
<div class="mt-4"></div>
<button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 30px !important; padding: 6px 20px;">
    <i class="mdi mdi-plus"></i> Tambah
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Tambah jadwal</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label style="font-size: 14px; margin-bottom: 5px;">Tanggal :</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label style="font-size: 14px; margin-bottom: 5px;">Jam :</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label style="font-size: 14px; margin-bottom: 5px;">Tempat :</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label style="font-size: 14px; margin-bottom: 5px;">Keterangan :</label>
                            <textarea name="" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="tablebasic" class="table" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tempat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>dummy</td>
                <td>dummy</td>
                <td>dummy</td>
                <td>dummy</td>
                <td>dummy</td>
            </tr>
        </tbody>
    </table>
</div>