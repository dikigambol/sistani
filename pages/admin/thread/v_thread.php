<?php
$sql = "SELECT * FROM forum INNER JOIN pengguna ON forum.id_user = pengguna.id_pengguna 
WHERE forum.id_user = $id_user ORDER BY id_forum DESC";
$query = $koneksi->query($sql);
$no = 1;

function formatTanggal($date)
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d M Y');
}
?>

<p style="font-size: 20px;">
    <b>Thread Saya</b>
</p>
<hr>
<div class="mt-4"></div>
<div class="card mb-4">
    <div class="card-body">
        <div class="header-forum mb-4">
            <h5><i class="mdi mdi-comment-plus-outline text-info"></i> &nbsp;<b>Buat Thread</b></h5>
        </div>
        <form action="<?php echo $base_url ?>pages/thread-api/c_thread.php" method="POST">
            <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
            <input type="text" name="judul" class="form-control" placeholder="judul thread">
            <textarea name="isi" rows="3" class="form-control mt-3" placeholder="isi thread"></textarea>
            <p style="text-align: right;">
                <button class="btn btn-primary mt-3" style="border-radius: 30px; padding: 5px 20px;">
                    <i class="mdi mdi-send"></i>&nbsp;&nbsp;buat
                </button>
            </p>
        </form>
    </div>
</div>
<?php while ($data = $query->fetch_array()) : ?>
    <div class="card mb-4">
        <div class="card-body">
            <div class="header-forum mb-4">
                <h5><i class="mdi mdi-account-circle"></i>&nbsp;<b><?php echo $data['nama'] ?></b> <span style="color: grey; font-size: 14px;">
                        - <?php echo formatTanggal($data['tgl_posting']); ?>
                    </span>
                </h5>
                <a href="<?php echo $base_url ?>pages/thread-api/d_thread.php?id=<?php echo $data['id_forum'] ?>" style="text-decoration: none;">
                    <p style="font-size: 14px; margin-top: -2px;" class="text-danger"><i class="mdi mdi-eraser"></i> hapus</p>
                </a>
            </div>
            <h4 class="card-title mb-3"><b><?php echo $data['judul'] ?></b></h4>
            <p class="card-text">
                <?php echo $data['isi'] ?>
            </p>
            <?php
            $idForum = $data['id_forum'];
            $sql2 = "SELECT * FROM komentar_forum INNER JOIN pengguna 
            ON komentar_forum.id_user = pengguna.id_pengguna WHERE komentar_forum.id_forum = $idForum ORDER BY id_komentar ASC";
            $query2 = $koneksi->query($sql2);
            $countKomen = mysqli_num_rows($query2);
            ?>
            <?php if ($countKomen >= 1) { ?>
                <hr>
                <h6 class="card-title mb-4"><b>Jawaban :</b></h6>
            <?php } ?>
            <?php while ($data2 = $query2->fetch_array()) : ?>
                <div class="mb-4">
                    <p><i class="mdi mdi-account-location"></i>&nbsp;<b><?php echo $data2['nama'] ?></b></p>
                    <p style="margin-top: -15px;"><?php echo $data2['komentar'] ?></p>
                    <?php if ($data2['id_user'] == $id_user) { ?>
                        <a href="<?php echo $base_url ?>pages/thread-api/d_komen.php?id=<?php echo $data2['id_komentar'] ?>" style="text-decoration: none;">
                            <p style="font-size: 14px; margin-top: -12px;" class="text-danger"><i class="mdi mdi-eraser"></i> hapus</p>
                        </a>
                    <?php } ?>
                </div>
            <?php endwhile ?>
            <hr>
            <p style="margin-bottom: 10px; font-size: 14px;">Tulis tanggapan anda :</p>
            <form action="<?php echo $base_url ?>pages/thread-api/c_komen.php" method="POST">
                <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                <input type="hidden" name="id_forum" value="<?php echo $data['id_forum']?>">
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