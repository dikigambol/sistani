<?php
$id = $_GET['id'];
$sql = "SELECT * FROM pengguna WHERE id_pengguna = $id";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

$sql2 = "SELECT * FROM detail_user LEFT JOIN jenis_kelamin ON detail_user.id_jk = jenis_kelamin.id_jk WHERE detail_user.id_pengguna = $id";
$query2 = $koneksi->query($sql2);
$data2 = $query2->fetch_array();

$sqlthread = "SELECT * FROM forum INNER JOIN pengguna ON forum.id_user = pengguna.id_pengguna 
WHERE forum.id_user = $id ORDER BY id_forum DESC";
$querythread = $koneksi->query($sqlthread);
$countThread = mysqli_num_rows($querythread);

function formatTanggal($date)
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d M Y');
}
?>

<p style="font-size: 20px;">
    <b>Detail Profil</b>
</p>
<hr>
<div class="mt-4 row">
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-account-box"></i> Nama Lengkap</b><br />
            <?php echo $data['nama'] ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-gender-male-female"></i> Gender</b><br />
            <?php echo $data2['nama_jk'] ?? "-" ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-map-marker"></i> Alamat</b><br />
            <?php echo $data2['alamat'] ?? "-" ?> <?php echo $data2['rt_rw'] ?? "-" ?>, <?php echo $data2['desa'] ?? "-" ?>,
            <?php echo $data2['kecamatan'] ?? "-" ?>, <?php echo $data2['kota'] ?? "-" ?>, <?php echo $data2['provinsi'] ?? "-" ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-phone"></i> Telepon</b><br />
            <?php echo $data2['telepon'] ?? "-" ?>
        </p>
    </div>
</div>
<h5 class="text-success mb-4"><b><i class="mdi mdi-comment-multiple-outline"></i> Threads</b></h5>
<?php if ($countThread < 1) { ?>
    <div class="empty-box">
        <img class="img-empty" src="assets/img/empty.svg" alt="">
        <br>
        <br>
        <h5 class="text-center">Tidak ada postingan &nbsp;&#9749;</h5>
    </div>
<?php } else { ?>
    <?php while ($datathread = $querythread->fetch_array()) : ?>
        <div class="card mb-4">
            <div class="card-body">
                <div class="header-forum mb-4">
                    <h5><i class="mdi mdi-account-circle"></i>&nbsp;<b><?php echo $datathread['nama'] ?></b> <span style="color: grey; font-size: 14px;">
                            - <?php echo formatTanggal($datathread['tgl_posting']); ?>
                        </span>
                    </h5>
                </div>
                <h4 class="card-title mb-3"><b><?php echo $datathread['judul'] ?></b></h4>
                <p class="card-text">
                    <?php echo $datathread['isi'] ?>
                </p>
                <?php
                $idForum = $datathread['id_forum'];
                $sqlthread2 = "SELECT * FROM komentar_forum INNER JOIN pengguna 
                ON komentar_forum.id_user = pengguna.id_pengguna WHERE komentar_forum.id_forum = $idForum ORDER BY id_komentar ASC";
                $querythread2 = $koneksi->query($sqlthread2);
                $countKomen = mysqli_num_rows($querythread2);
                ?>
                <?php if ($countKomen >= 1) { ?>
                    <hr>
                    <h6 class="card-title mb-4"><b>Jawaban :</b></h6>
                <?php } ?>
                <?php while ($datakomen = $querythread2->fetch_array()) : ?>
                    <div class="mb-4">
                        <p><i class="mdi mdi-account-location"></i>&nbsp;<b><?php echo $datakomen['nama'] ?></b></p>
                        <p style="margin-top: -15px;"><?php echo $datakomen['komentar'] ?></p>
                        <?php if ($datakomen['id_user'] == $id_user) { ?>
                            <a href="<?php echo $base_url ?>pages/thread-api/d_komen.php?id=<?php echo $datakomen['id_komentar'] ?>" style="text-decoration: none;">
                                <p style="font-size: 14px; margin-top: -12px;" class="text-danger"><i class="mdi mdi-eraser"></i> hapus</p>
                            </a>
                        <?php } ?>
                    </div>
                <?php endwhile ?>
                <hr>
                <p style="margin-bottom: 10px; font-size: 14px;">Tulis tanggapan anda :</p>
                <form action="<?php echo $base_url ?>pages/thread-api/c_komen.php" method="POST">
                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                    <input type="hidden" name="id_forum" value="<?php echo $datathread['id_forum'] ?>">
                    <textarea name="komentar" rows="2" class="form-control"></textarea>
                    <p style="text-align: right;">
                        <button class="btn btn-primary mt-3" style="border-radius: 30px; padding: 5px 20px;">
                            <i class="mdi mdi-send"></i>&nbsp;&nbsp;kirim
                        </button>
                    </p>
                </form>
            </div>
        </div>
    <?php endwhile ?>
<?php } ?>