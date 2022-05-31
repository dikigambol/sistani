<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id_user']);
$judul = addslashes($_POST['judul']);
$isi = addslashes($_POST['isi']);
$tanggal = date("Y-m-d");

$sql = "INSERT INTO `forum` (`id_forum`, `id_user`, `judul`, `isi`, `tgl_posting`) 
VALUES (NULL, '$id', '$judul', '$isi', '$tanggal');";
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
