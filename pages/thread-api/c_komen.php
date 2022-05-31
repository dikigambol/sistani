<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id_user']);
$idForum = addslashes($_POST['id_forum']);
$komentar = addslashes($_POST['komentar']);
$tanggal = date("Y-m-d");

$sql = "INSERT INTO `komentar_forum` (`id_komentar`, `id_forum`, `id_user`, `komentar`, `tgl_komentar`) 
VALUES (NULL, '$idForum', '$id', '$komentar', '$tanggal');";
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
