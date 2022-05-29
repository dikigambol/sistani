<?php
$sql = "SELECT * FROM daerah";
$query = $koneksi->query($sql);
$no = 1;
?>

<p style="font-size: 20px;">
    <b>List Daerah</b>
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
                <h6 class="modal-title" id="exampleModalLabel">Tambah daerah</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $base_url ?>pages/admin/daerah/c_daerah.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Nama Daerah :</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="tablebasic" class="table" style="width:100%">
        <thead>
            <tr>
                <th width="10">No</th>
                <th>Nama Daerah</th>
                <th width="100">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = $query->fetch_array()) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_daerah'] ?></td>
                    <td>
                        <div class="mb-1">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $data['id_daerah'] ?>" style="width: 65px;">edit</button>
                        </div>
                        <form action="<?php echo $base_url ?>pages/admin/daerah/d_daerah.php" class="pull-left" method="post">
                            <input type="hidden" name="id_daerah" value="<?php echo $data['id_daerah'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" style="width: 65px;" onclick="return confirm('Anda yakin ingin menghapus data ini?')">hapus</button>
                        </form>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modalEdit<?php echo $data['id_daerah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Edit daerah</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?php echo $base_url ?>pages/admin/daerah/u_daerah.php" method="POST">
                                <input type="hidden" name="id_daerah" value="<?php echo $data['id_daerah'] ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Nama Daerah :</label>
                                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_daerah'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </tbody>
    </table>
</div>