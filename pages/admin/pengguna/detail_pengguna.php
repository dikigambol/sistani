<?php
$id = $_GET['id'];
$sql = "SELECT * FROM pengguna WHERE id_pengguna = $id";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

$sql2 = "SELECT * FROM detail_user LEFT JOIN jenis_kelamin ON detail_user.id_jk = jenis_kelamin.id_jk WHERE detail_user.id_pengguna = $id";
$query2 = $koneksi->query($sql2);
$data2 = $query2->fetch_array()
?>

<p style="font-size: 20px;">
    <b>Profil Akun</b>
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
            <b><i class="mdi mdi-account-card-details"></i> NIK</b><br />
            <?php echo $data2['NIK'] ?? "-" ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-calendar-range"></i> Tempat & Tanggal Lahir</b><br />
            <?php echo $data2['tempat_lahir'] ?? "-" ?>, <?php echo $data2['tanggal_lahir'] ?? "-" ?>
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
            <?php echo $data2['kecamatan'] ?? "-" ?>, <?php echo $data2['kota'] ?? "-" ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-phone"></i> Telepon</b><br />
            <?php echo $data2['telepon'] ?? "-" ?>
        </p>
    </div>
</div>