<?php
session_start();
include "../../../koneksi.php";
$id = addslashes($_POST['id_agenda']);
$tanggal = addslashes($_POST['tanggal']);
$jam = addslashes($_POST['jam']);
$keterangan = addslashes($_POST['keterangan']);

$sql = "UPDATE `agenda` SET `tanggal_agenda` = '$tanggal', `jam_agenda` = '$jam', `keterangan` = '$keterangan'
WHERE `id_agenda` = $id;";
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
