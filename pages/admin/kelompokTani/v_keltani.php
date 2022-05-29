<?php
$sql = "SELECT * FROM kelompok_tani LEFT JOIN daerah ON kelompok_tani.id_daerah = daerah.id_daerah";
$query = $koneksi->query($sql);
$no = 1;

$level = "SELECT * FROM daerah";
$querylevel = $koneksi->query($level);
?>

<p style="font-size: 20px;">
    <b>Kelompok Tani</b>
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
                <h6 class="modal-title" id="exampleModalLabel">Tambah kelompok tani</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $base_url ?>pages/admin/kelompokTani/c_keltani.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Nama Kelompok Tani :</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Daerah :</label>
                                <select name="daerah" class="form-control">
                                    <option value="">- pilih -</option>
                                    <?php while ($datalevel = $querylevel->fetch_array()) : ?>
                                        <option value="<?php echo $datalevel['id_daerah'] ?>"><?php echo $datalevel['nama_daerah'] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Luas Lahan :</label>
                                <input type="text" class="form-control" name="luas">
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
                <th>Nama Kelompok Tani</th>
                <th>Daerah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = $query->fetch_array()) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <a class="link-kel-tani" href="<?php echo $base_url ?>dashboard-admin.php?page=detailkeltani&id=<?php echo $data['id_kelompok_tani'] ?>" title="lihat detail">
                            <?php echo $data['nama_kelompok_tani'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $data['nama_daerah'] ?>
                    </td>
                    <td>
                        <div class="mb-1">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $data['id_kelompok_tani'] ?>" style="width: 65px;">edit</button>
                        </div>
                        <form action="<?php echo $base_url ?>pages/admin/kelompokTani/d_keltani.php" class="pull-left" method="post">
                            <input type="hidden" name="id_keltani" value="<?php echo $data['id_kelompok_tani'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" style="width: 65px;" onclick="return confirm('Anda yakin ingin menghapus data ini?')">hapus</button>
                        </form>
                    </td>
                </tr>
                <!-- Modal edit -->
                <div class="modal fade" id="modalEdit<?php echo $data['id_kelompok_tani'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Edit kelompok tani</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?php echo $base_url ?>pages/admin/kelompokTani/u_keltani.php" method="POST">
                                <input type="hidden" name="id_keltani" value="<?php echo $data['id_kelompok_tani'] ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Nama Kelompok Tani :</label>
                                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_kelompok_tani'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Daerah :</label>
                                                <select name="daerah" class="form-control">
                                                    <option value="">- pilih -</option>
                                                    <?php
                                                    $sqlSelect = "SELECT * FROM daerah";
                                                    $querySelect = $koneksi->query($sqlSelect);
                                                    $daerahId = $data['id_daerah'];
                                                    while ($hasil = mysqli_fetch_array($querySelect)) {
                                                        $selected = "";
                                                        if ($daerahId == $hasil['id_daerah']) {
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $hasil['id_daerah']; ?>">
                                                            <?php echo $hasil['nama_daerah']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Luas Lahan :</label>
                                                <input type="text" class="form-control" name="luas" value="<?php echo $data['luas_lahan']; ?>">
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