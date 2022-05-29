<?php
$sql = "SELECT * FROM pengguna INNER JOIN level_user 
ON pengguna.id_level = level_user.id_level WHERE pengguna.id_pengguna NOT IN ($id_user)";
$query = $koneksi->query($sql);
$no = 1;

$level = "SELECT * FROM level_user";
$querylevel = $koneksi->query($level);
?>

<p style="font-size: 20px;">
    <b>List Pengguna</b>
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
                <h6 class="modal-title" id="exampleModalLabel">Tambah pengguna</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $base_url ?>pages/admin/pengguna/c_pengguna.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Nama :</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Username :</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Level :</label>
                                <select name="level" class="form-control">
                                    <option value="">- pilih -</option>
                                    <?php while ($datalevel = $querylevel->fetch_array()) : ?>
                                        <option value="<?php echo $datalevel['id_level'] ?>"><?php echo $datalevel['nama_level'] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label style="font-size: 14px; margin-bottom: 5px;">Password :</label>
                                <input type="text" class="form-control" name="password">
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
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = $query->fetch_array()) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <a class="link-kel-tani" href="<?php echo $base_url ?>dashboard-admin.php?page=detailprofil&id=<?php echo $data['id_pengguna'] ?>" title="lihat detail">
                            <?php echo $data['nama'] ?>
                        </a>
                    </td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['nama_level'] ?></td>
                    <td>
                        <div class="mb-1">
                            <button class="btn btn-primary btn-sm" style="width: 65px;" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $data['id_pengguna'] ?>">edit</button>
                        </div>
                        <form action="<?php echo $base_url ?>pages/admin/pengguna/d_pengguna.php" class="pull-left" method="post">
                            <input type="hidden" name="id_user" value="<?php echo $data['id_pengguna'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" style="width: 65px;" onclick="return confirm('Anda yakin ingin menghapus data ini?')">hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit-->
                <div class="modal fade" id="modalEdit<?php echo $data['id_pengguna'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Edit pengguna</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?php echo $base_url ?>pages/admin/pengguna/u_pengguna.php" method="POST">
                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $data['id_pengguna'] ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Nama :</label>
                                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Username :</label>
                                                <input type="text" class="form-control" name="username" readonly value="<?php echo $data['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Level :</label>
                                                <select name="level" class="form-control">
                                                    <option value="">- pilih -</option>
                                                    <?php
                                                    $sqlSelect = "SELECT * FROM level_user";
                                                    $querySelect = $koneksi->query($sqlSelect);
                                                    $levelId = $data['id_level'];
                                                    while ($hasil = mysqli_fetch_array($querySelect)) {
                                                        $selected = "";
                                                        if ($levelId == $hasil['id_level']) {
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $hasil['id_level']; ?>">
                                                            <?php echo $hasil['nama_level']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Password :</label>
                                                <input type="text" class="form-control" name="password" value="<?php echo $data['password'] ?>">
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