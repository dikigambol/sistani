<?php
$sql = "SELECT * FROM bantuan";
$query = $koneksi->query($sql);
$no = 1;
?>

<p style="font-size: 20px;">
    <b>List Bantuan</b>
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
                <h6 class="modal-title" id="exampleModalLabel">Tambah bantuan</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $base_url ?>pages/admin/bantuan/c_bantuan.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Nama Bantuan :</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Keterangan :</label>
                                <textarea name="keterangan" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Tanggal :</label>
                                <input type="date" class="form-control" name="tanggal">
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
                <th>No</th>
                <th>Nama Bantuan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = $query->fetch_array()) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <a class="link-kel-tani" href="<?php echo $base_url ?>dashboard-admin.php?page=detailbantuan&id=<?php echo $data['id_bantuan']?>" title="lihat detail">
                            <?php echo $data['nama_bantuan'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $data['tgl_bantuan'] ?>
                    </td>
                    <td>
                        <div class="mb-1">
                            <button class="btn btn-primary btn-sm" style="width: 65px;" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $data['id_bantuan'] ?>">edit</button>
                        </div>
                        <div>
                            <form action="<?php echo $base_url ?>pages/admin/bantuan/d_bantuan.php" class="pull-left" method="post">
                                <input type="hidden" name="id_bantuan" value="<?php echo $data['id_bantuan'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm" style="width: 65px;" onclick="return confirm('Anda yakin ingin menghapus data ini?')">hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <!-- Modal edit -->
                <div class="modal fade" id="modalEdit<?php echo $data['id_bantuan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Edit bantuan</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?php echo $base_url ?>pages/admin/bantuan/u_bantuan.php" method="POST">
                                <input type="hidden" name="id_bantuan" value="<?php echo $data['id_bantuan'] ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Nama Bantuan :</label>
                                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_bantuan'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Keterangan :</label>
                                                <textarea name="keterangan" rows="3" class="form-control"><?php echo $data['ket_bantuan'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Tanggal :</label>
                                                <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tgl_bantuan'] ?>">
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