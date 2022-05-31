<?php
session_start();
include "../../../koneksi.php";
$id_user = addslashes($_POST['id_user']);
$id_bantuan = addslashes($_POST['id_bantuan']);

$sql = "INSERT INTO `detail_bantuan` (`id_detail_bantuan`, `id_bantuan`, `id_user`) 
VALUES (NULL, '$id_bantuan', '$id_user');";
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
