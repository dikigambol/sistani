<?php
    $penggunasql = "SELECT count(1) FROM pengguna";
    $execpengguna = $koneksi->query($penggunasql);
    $datapengguna = $execpengguna->fetch_array();
    $totalPengguna = $datapengguna[0];

    $daerahsql = "SELECT count(1) FROM daerah";
    $execdaerah = $koneksi->query($daerahsql);
    $datadaerah = $execdaerah->fetch_array();
    $totalDaerah = $datadaerah[0];

    $keltanisql = "SELECT count(1) FROM kelompok_tani";
    $execkeltani = $koneksi->query($keltanisql);
    $datakeltani = $execkeltani->fetch_array();
    $totalKelTani = $datakeltani[0];

    $bantuansql = "SELECT count(1) FROM bantuan";
    $execbantuan = $koneksi->query($bantuansql);
    $databantuan = $execbantuan->fetch_array();
    $totalBantuan = $databantuan[0];
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card" style="padding: 8px 10px !important; background-color: #fbfff0;">
            <div class="card-body">
                <div class="box-nama row">
                    <div class="col-lg-6">
                        <h4 style="color: #97c918; margin-top: 10px;"><b>Selamat Datang &#128516;</b></h4>
                        <div class="mt-4"></div>
                        <a href="<?php echo $base_url ?>dashboard-admin.php?page=setting" class="btn-setting">
                            <i class="mdi mdi-account-settings-variant"></i> setting akun
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://i.ibb.co/wLDW093/bg-dash-removebg-preview.png" class="bg-dash" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card card-biru">
            <div class="card-body">
                <p style="font-size: 14px;">Jumlah Pengguna</p>
                <h4 style="font-size: 30px; margin-top: -5px;"><?php echo $totalPengguna?></h4>
                <p style="font-size: 13px; margin-top: -10px; margin-bottom: 2px;">total jumlah</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card card-ungu">
            <div class="card-body">
                <p style="font-size: 14px;">Jumlah Daerah</p>
                <h4 style="font-size: 30px; margin-top: -5px;"><?php echo $totalDaerah?></h4>
                <p style="font-size: 13px; margin-top: -10px; margin-bottom: 2px;">total jumlah</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card card-hijau">
            <div class="card-body">
                <p style="font-size: 14px;">Jumlah Kelompok Tani</p>
                <h4 style="font-size: 30px; margin-top: -5px;"><?php echo $totalKelTani?></h4>
                <p style="font-size: 13px; margin-top: -10px; margin-bottom: 2px;">total jumlah</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card card-merah">
            <div class="card-body">
                <p style="font-size: 14px;">Jumlah Bantuan</p>
                <h4 style="font-size: 30px; margin-top: -5px;"><?php echo $totalBantuan?></h4>
                <p style="font-size: 13px; margin-top: -10px; margin-bottom: 2px;">total jumlah</p>
            </div>
        </div>
    </div>
</div>