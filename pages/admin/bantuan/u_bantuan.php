<?php
session_start();
include "../../../koneksi.php";

$id = addslashes($_POST['id_bantuan']);
$nama = addslashes($_POST['nama']);
$keterangan = addslashes($_POST['keterangan']);
$tanggal = addslashes($_POST['tanggal']);

$sql = "UPDATE `bantuan` SET `nama_bantuan` = '$nama', `ket_bantuan` = '$keterangan', `tgl_bantuan` = '$tanggal'
WHERE `id_bantuan` = $id;";
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
