<?php
session_start();
include "../../../koneksi.php";
$nama = addslashes($_POST['nama']);
$keterangan = addslashes($_POST['keterangan']);
$tanggal = addslashes($_POST['tanggal']);

$sql = "INSERT INTO `bantuan` (`id_bantuan`, `nama_bantuan`, `ket_bantuan`, `tgl_bantuan`) 
VALUES (NULL, '$nama', '$keterangan', '$tanggal');";
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
