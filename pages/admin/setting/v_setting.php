<?php
$sql = "SELECT * FROM detail_user 
LEFT JOIN jenis_kelamin ON detail_user.id_jk = jenis_kelamin.id_jk 
WHERE detail_user.id_pengguna = $id_user";
$query = $koneksi->query($sql);
$data = $query->fetch_array()
?>

<form method="POST" action="<?php echo $base_url ?>pages/admin/setting/u_setting.php">
    <input type="hidden" name="id_pengguna" value="<?php echo $id_user ?>">
    <div id="textbox">
        <p class="alignleft" style="font-size: 20px;">
            <b>Setting Akun</b>
        </p>
        <p class="alignright"><a href="<?php echo $base_url ?>dashboard-admin.php" class="btn-profil">
                <i class="mdi mdi-close-circle-outline"></i> Kembali</a>
        </p>
    </div>
    <div style="clear: both;"></div>
    <hr>
    <div class="mt-4 row">
        <div class="col-lg-12 mb-4">
            <p><b>Nama Lengkap</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="nama" value="<?php echo $nama_lengkap ?>">
        </div>
        <div class="col-lg-6 mb-4">
            <p><b>NIK</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="nik" value="<?php echo $data['NIK'] ?? "" ?>">
        </div>
        <div class="col-lg-6 mb-4">
            <p><b>Gender</b></p>
            <select name="gender" class="form-control" style="margin-top: -5px;">
                <option value="0">- pilih -</option>
                <?php
                $sqlSelect = "SELECT * FROM jenis_kelamin";
                $querySelect = $koneksi->query($sqlSelect);
                $jkId = $data['id_jk'];
                while ($hasil = mysqli_fetch_array($querySelect)) {
                    $selected = "";
                    if ($jkId == $hasil['id_jk']) {
                        $selected = "selected";
                    }
                ?>
                    <option <?php echo $selected; ?> value="<?php echo $hasil['id_jk']; ?>">
                        <?php echo $hasil['nama_jk']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-lg-6 mb-4">
            <p><b>Tempat Lahir</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="tempat_lahir" value="<?php echo $data['tempat_lahir'] ?? "" ?>">
        </div>
        <div class="col-lg-6 mb-4">
            <p><b>Tanggal Lahir</b></p>
            <input type="date" class="form-control" style="margin-top: -5px;" name="tgl_lahir" value="<?php echo $data['tanggal_lahir'] ?? "" ?>">
        </div>
        <div class="col-lg-12 mb-4">
            <p><b>Alamat</b></p>
            <textarea name="alamat" rows="2" class="form-control" style="margin-top: -5px;"><?php echo $data['alamat'] ?? "" ?></textarea>
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>RT/RW</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="rtrw" placeholder="ex. RT.3/RW.5" value="<?php echo $data['rt_rw'] ?? "" ?>">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Desa</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="desa" value="<?php echo $data['desa'] ?? "" ?>">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Kecamatan</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="kecamatan" value="<?php echo $data['kecamatan'] ?? "" ?>">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Kota</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="kota" value="<?php echo $data['kota'] ?? "" ?>">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Provinsi</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="provinsi" value="<?php echo $data['provinsi'] ?? "" ?>">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Telepon</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="telepon" value="<?php echo $data['telepon'] ?? "" ?>">
        </div>
        <div class="col-lg-6 mb-4">
            <p><b>Username</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="username" value="<?php echo $username ?>" readonly>
        </div>
        <div class="col-lg-6 mb-4">
            <p><b>Password Baru</b></p>
            <input type="password" class="form-control" style="margin-top: -5px;" name="password">
        </div>
    </div>
    <br>
    <p style="text-align: right;">
        <button class="btn btn-primary">
            <i class="mdi mdi-content-save"></i>
            Simpan perubahan
        </button>
    </p>
</form>