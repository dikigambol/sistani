<?php
$sql = "SELECT * FROM detail_user 
LEFT JOIN jenis_kelamin ON detail_user.id_jk = jenis_kelamin.id_jk 
WHERE detail_user.id_pengguna = $id_user";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

function formatTanggal($date)
{
    if ($date != "") {
        $datetime = DateTime::createFromFormat('Y-m-d', $date);
        return $datetime->format('d M Y');
    } else {
        return "-";
    }
}
?>

<div id="textbox">
    <p class="alignleft" style="font-size: 20px;">
        <b>Profil Akun</b>
    </p>
    <p class="alignright"><a href="<?php echo $base_url ?>dashboard-user.php?page=ubahprofil" class="btn-profil">
            <i class="mdi mdi-lead-pencil"></i> Perbarui Profil</a>
    </p>
</div>
<div style="clear: both;"></div>
<hr>
<div class="mt-4 row">
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-account-box"></i> Nama Lengkap</b><br />
            <?php echo $nama_lengkap?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-account-card-details"></i> NIK</b><br />
            <?php echo $data['NIK'] ?? "-"?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-calendar-range"></i> Tempat & Tanggal Lahir</b><br />
            <?php echo $data['tempat_lahir'] ?? "-"?>, <?php echo formatTanggal($data['tanggal_lahir']) ?? "-"?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-gender-male-female"></i> Gender</b><br />
            <?php echo $data['nama_jk'] ?? "-"?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-map-marker"></i> Alamat</b><br />
            <?php echo $data['alamat'] ?? "-"?> <?php echo $data['rt_rw'] ?? "-"?>, <?php echo $data['desa'] ?? "-"?>, 
            <?php echo $data['kecamatan'] ?? "-"?>, <?php echo $data['kota'] ?? "-"?>, <?php echo $data['provinsi'] ?? "-"?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-phone"></i> Telepon</b><br />
            <?php echo $data['telepon'] ?? "-"?>
        </p>
    </div>
</div>