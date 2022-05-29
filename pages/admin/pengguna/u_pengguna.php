<?php
session_start();
include "../../../koneksi.php";

$id = addslashes($_POST['id_user']);
$nama = addslashes($_POST['nama']);
$level = addslashes($_POST['level']);
$password = addslashes($_POST['password']);

$sql = "UPDATE `pengguna` SET `nama` = '$nama', `id_level` = '$level', `password` = '$password' 
WHERE `id_pengguna` = $id;";
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
