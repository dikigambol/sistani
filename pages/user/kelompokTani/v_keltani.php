<?php
$sql = "SELECT * FROM kelompok_tani LEFT JOIN daerah ON 
kelompok_tani.id_daerah = daerah.id_daerah WHERE kelompok_tani.id_kelompok_tani = $idkelompoktani";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

$sql2 = "SELECT * FROM anggota LEFT JOIN pengguna ON 
anggota.id_user = pengguna.id_pengguna WHERE anggota.id_kelompok_tani = $idkelompoktani";
$query2 = $koneksi->query($sql2);

$no = 1;
$no2 = 1;
?>


<?php if ($kelompoktani == "-") { ?>
    <div class="empty-box">
        <img class="img-empty" src="assets/img/empty.svg" alt="">
        <br>
        <br>
        <h5 class="text-center">Belum gabung kelompok tani &nbsp;&#127806;</h5>
    </div>
<?php } else { ?>
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
    <div class="table-responsive">
        <table id="tablebasic" class="table" style="width:100%">
            <thead>
                <tr>
                    <th width="5">No</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $query2->fetch_array()) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                            <a class="link-kel-tani" href="<?php echo $base_url ?>dashboard-user.php?page=detailprofil&id=<?php echo $data['id_pengguna'] ?>" title="lihat detail">
                                <?php echo $data['nama'] ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $data['jabatan'] ?>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
<?php } ?>