<form>
    <div id="textbox">
        <p class="alignleft" style="font-size: 20px;">
            <b>Profil Akun</b>
        </p>
        <p class="alignright"><a href="<?php echo $base_url ?>dashboard-user.php" class="btn-profil">
                <i class="mdi mdi-close-circle-outline"></i> Batal Perbarui</a>
        </p>
    </div>
    <div style="clear: both;"></div>
    <hr>
    <div class="mt-4 row">
        <div class="col-lg-12 mb-4">
            <p><b>Nama Lengkap</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="nama">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>NIK</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="nik">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Tempat Lahir</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="tempat_lahir">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Tanggal Lahir</b></p>
            <input type="date" class="form-control" style="margin-top: -5px;" name="tgl_lahir">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Gender</b></p>
            <select name="gender" class="form-control" style="margin-top: -5px;">
                <option value="">- pilih -</option>
            </select>
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Telepon</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="telepon">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Email</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="email">
        </div>
        <div class="col-lg-12 mb-4">
            <p><b>Alamat</b></p>
            <textarea name="alamat" rows="2" class="form-control" style="margin-top: -5px;"></textarea>
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>RT/RW</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="rtrw" placeholder="ex. rt 3/rw 5">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Desa</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="desa">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Kecamatan</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="kecamatan">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Kota</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="kota">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Provinsi</b></p>
            <input type="text" class="form-control" style="margin-top: -5px;" name="provinsi">
        </div>
        <div class="col-lg-4 mb-4">
            <p><b>Ganti Password</b></p>
            <input type="password" class="form-control" style="margin-top: -5px;" name="provinsi">
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