<?php
session_start();
include "../../../koneksi.php";
$nama = addslashes($_POST['nama']);
$daerah = addslashes($_POST['daerah']);
$luas = addslashes($_POST['luas']);

$sql = "INSERT INTO `kelompok_tani` (`id_kelompok_tani`, `id_daerah`, `nama_kelompok_tani`,
luas_lahan) 
VALUES (NULL, '$daerah', '$nama', '$luas');";
$query = $koneksi->query($sql);

if ($query == true) {
    $_SESSION["status"] = 'sukses';
    echo "<script>
        window.history.go(-1);
        </script>";
} else {
    $_SESSION["status"] = 'gagal';
    $_SESSION["deskripsi"] = 'Redirect...';
    echo "<script>
        window.history.go(-1);
        </script>";
}
