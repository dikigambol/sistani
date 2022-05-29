<?php
session_start();
include("../../../koneksi.php");
$id = $_POST['id_user'];

$sql = "DELETE FROM `pengguna` WHERE `id_pengguna` = '$id'";
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
