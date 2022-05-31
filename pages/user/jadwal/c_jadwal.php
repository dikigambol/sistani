<?php
session_start();
include "../../../koneksi.php";
$idkeltani = addslashes($_POST['id_keltani']);
$tanggal = addslashes($_POST['tanggal']);
$jam = addslashes($_POST['jam']);
$keterangan = addslashes($_POST['keterangan']);

$sql = "INSERT INTO `agenda` (`id_agenda`, `id_kelompok_tani`, `tanggal_agenda`, `jam_agenda`, `keterangan`) 
VALUES (NULL, '$idkeltani', '$tanggal', '$jam', '$keterangan');";
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
