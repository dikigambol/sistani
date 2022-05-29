<?php
session_start();
include "../../../koneksi.php";

$id = addslashes($_POST['id_keltani']);
$nama = addslashes($_POST['nama']);
$daerah = addslashes($_POST['daerah']);
$luas = addslashes($_POST['luas']);

$sql = "UPDATE `kelompok_tani` SET `nama_kelompok_tani` = '$nama', `id_daerah` = '$daerah',
`luas_lahan` = '$luas' WHERE `id_kelompok_tani` = $id;";
$query = $koneksi->query($sql);

if ($query == true) {
    $_SESSION["status"] = 'sukses';
    echo "<script>
    window.history.go(-1);
    </script>";
} else {
    $_SESSION["status"] = 'gagal';
    $_SESSION["deskripsi"] = 'Redirecting...';
    echo "<script>
    window.history.go(-1);
    </script>";
}
