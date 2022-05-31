<?php
$sql = "SELECT * FROM bantuan ORDER BY tgl_bantuan DESC";
$query = $koneksi->query($sql);
$no = 1;

function formatTanggal($date)
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d M Y');
}
?>

<p style="font-size: 20px;">
    <b>Daftar Bantuan</b>
</p>
<hr>
<div class="mt-4"></div>
<input id="searchbantuan" type="text" placeholder="🔍&nbsp;&nbsp;&nbsp;cari bantuan" class="form-control mb-3">
<div class="empty-box-bantuan mt-5">
    <img class="img-empty" src="assets/img/empty.svg" alt="">
    <br>
    <br>
    <h5 class="text-center">Tidak ditemukan &nbsp;&#9749;</h5>
</div>
<div class="listbantuan">
    <?php while ($data = $query->fetch_array()) : ?>
        <?php
        $disabled = "";
        $idbantuan = $data['id_bantuan'];
        $sqlcek = "SELECT * FROM detail_bantuan WHERE id_bantuan = $idbantuan AND id_user = $id_user";
        $querycek = $koneksi->query($sqlcek);
        $datacek = $querycek->fetch_array();
        $idbantuancek = $datacek['id_bantuan'] ?? "";
        ?>
        <div class="card mb-4" style="border: 2px dotted #d6d6d6;">
            <div class="card-body">
                <div class="header-forum mb-4">
                    <h5><i class="mdi mdi-ticket-confirmation"></i> &nbsp;<b>Kupon bantuan logistik</b>
                        <br>
                        <span style="color: grey; font-size: 14px;">
                            <i class="mdi mdi-calendar"></i> <?php echo FormatTanggal($data['tgl_bantuan']) ?>
                        </span>
                    </h5>
                </div>
                <h4 class="card-title mb-2"><b><?php echo $data['nama_bantuan'] ?></b></h4>
                <p class="card-text">
                    <?php echo $data['ket_bantuan'] ?>
                </p>
                <form action="<?php echo $base_url ?>pages/user/bantuan/klaim_bantuan.php" method="POST">
                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                    <input type="hidden" name="id_bantuan" value="<?php echo $data['id_bantuan'] ?>">
                    <p style="text-align: right;">
                        <?php if ($idbantuan == $idbantuancek) { ?>
                            <button class="btn btn-primary mt-3" style="border-radius: 30px; padding: 5px 20px; margin-bottom: -15px;" disabled>
                                <i class="mdi mdi-checkbox-marked-circle-outline"></i>&nbsp;&nbsp;sudah diklaim
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-primary mt-3" style="border-radius: 30px; padding: 5px 20px; margin-bottom: -15px;">
                                <i class="mdi mdi-checkbox-blank-circle-outline"></i>&nbsp;&nbsp;klaim kupon
                            </button>
                        <?php } ?>
                    </p>
                </form>
            </div>
        </div>
    <?php endwhile ?>
</div>
</div>