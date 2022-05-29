<?php
$id = $_GET['id'];
$sql = "SELECT * FROM kelompok_tani LEFT JOIN daerah ON 
kelompok_tani.id_daerah = daerah.id_daerah WHERE kelompok_tani.id_kelompok_tani = $id";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

$sql2 = "SELECT * FROM anggota LEFT JOIN pengguna ON 
anggota.id_user = pengguna.id_pengguna WHERE anggota.id_kelompok_tani = $id";
$query2 = $koneksi->query($sql2);

$no = 1;
$no2 = 1;

$sql3 = "SELECT * FROM pengguna LEFT JOIN anggota ON pengguna.id_pengguna = anggota.id_user WHERE pengguna.id_level NOT IN (1) AND anggota.id_kelompok_tani IS NULL;";
$query3 = $koneksi->query($sql3);
?>

<p style="font-size: 20px;">
    <b>Kelompok Tani</b>
</p>
<p style="color: grey; margin-top: -15px; font-size: 18px;"><i class="mdi mdi-corn"></i>
    <?php echo $data['nama_kelompok_tani'] ?></p>
<hr>
<div class="mt-4 row">
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-map-marker"></i> Daerah</b><br />
            <?php echo $data['nama_daerah'] ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-map"></i> Luas Lahan</b><br />
            <?php echo $data['luas_lahan'] ?> m<sup>2</sup>
        </p>
    </div>
</div>
<h5 class="text-success mb-4"><b><i class="mdi mdi-account-settings"></i> Anggota</b></h5>
<button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 30px !important; padding: 6px 20px;">
    <i class="mdi mdi-plus"></i> Tambah
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Tambah anggota</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tablebasic2" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5">No</th>
                                <th width="300">Nama Lengkap</th>
                                <th width="10">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data2 = $query3->fetch_array()) : ?>
                                <tr>
                                    <td><?php echo $no2++ ?></td>
                                    <td>
                                        <?php echo $data2['nama'] ?>
                                    </td>
                                    <td>
                                        <form action="<?php echo $base_url ?>pages/admin/kelompokTani/t_anggota.php" method="POST">
                                            <input type="hidden" name="id_user" value="<?php echo $data2['id_pengguna'] ?>">
                                            <input type="hidden" name="id_keltani" value="<?php echo $id ?>">
                                            <button class="btn btn-primary btn-sm">tambah</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tablebasic" class="table" style="width:100%">
        <thead>
            <tr>
                <th width="5">No</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th width="100">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = $query2->fetch_array()) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <a class="link-kel-tani" href="<?php echo $base_url ?>dashboard-admin.php?page=detailprofil&id=<?php echo $data['id_pengguna'] ?>" title="lihat detail">
                            <?php echo $data['nama'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $data['jabatan'] ?>
                    </td>
                    <td>
                        <?php if ($data['jabatan'] != "ketua") { ?>
                            <div class="mb-1">
                                <form action="<?php echo $base_url ?>pages/admin/kelompokTani/kt_anggota.php" method="POST">
                                    <input type="hidden" name="id_user" value="<?php echo $data['id_pengguna'] ?>">
                                    <input type="hidden" name="id_keltani" value="<?php echo $id ?>">
                                    <button class="btn btn-primary btn-sm" style="width: 65px;">ketua</button>
                                </form>
                            </div>
                        <?php } ?>
                        <div>
                            <form action="<?php echo $base_url ?>pages/admin/kelompokTani/k_anggota.php" method="POST">
                                <input type="hidden" name="id_user" value="<?php echo $data['id_pengguna'] ?>">
                                <button onclick="return confirm('Anda yakin ingin mengeluarkan user ini?')" class="btn btn-danger btn-sm" style="width: 65px;">keluar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>