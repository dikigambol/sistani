<?php
session_start();
include "../../../koneksi.php";
$nama = addslashes($_POST['nama']);

$sql = "INSERT INTO `daerah` (`id_daerah`, `nama_daerah`) 
VALUES (NULL, '$nama');";
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
