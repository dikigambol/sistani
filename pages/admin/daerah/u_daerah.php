<?php
session_start();
include "../../../koneksi.php";

$id = addslashes($_POST['id_daerah']);
$nama = addslashes($_POST['nama']);

$sql = "UPDATE `daerah` SET `nama_daerah` = '$nama' WHERE `id_daerah` = $id;";
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
