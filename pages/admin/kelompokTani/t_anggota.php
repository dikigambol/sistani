<?php
session_start();
include "../../../koneksi.php";
$iduser = addslashes($_POST['id_user']);
$idkeltani = addslashes($_POST['id_keltani']);
$jabatan = "anggota";

$sql = "INSERT INTO `anggota` (`id_anggota`, `id_user`, `jabatan`, `id_kelompok_tani`) 
VALUES (NULL, '$iduser', '$jabatan', '$idkeltani');";
$query = $koneksi->query($sql);

if ($query == true) {
    $_SESSION["status"] = 'sukses';
    echo "<script>
        window.history.go(-1);
        </script>";
} else {
    $_SESSION["status"] = 'gagal';
    $_SESSION["deskripsi"] = 'nama tersebut sudah ditambahkan!';
    echo "<script>
        window.history.go(-1);
        </script>";
}
