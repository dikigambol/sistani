<?php
session_start();
include "../../../koneksi.php";
$nama = addslashes($_POST['nama']);
$username = addslashes($_POST['username']);
$level = addslashes($_POST['level']);
$password = addslashes($_POST['password']);

$sql = "INSERT INTO `pengguna` (`id_pengguna`, `nama`, `username`, `password`, `id_level`) 
VALUES (NULL, '$nama', '$username', '$password', '$level');";
$query = $koneksi->query($sql);

if ($query == true) {
    $getIdSql = "SELECT id_pengguna FROM pengguna WHERE username = '$username';";
    $queryGetId = $koneksi->query($getIdSql);
    $data = $queryGetId->fetch_array();
    $id = $data['id_pengguna'];

    $sql2 = "INSERT INTO `detail_user` (`id_detail`, `id_pengguna`, `NIK`, `tempat_lahir`, 
    `tanggal_lahir`, `id_jk`, `alamat`, `rt_rw`, `desa`, `kecamatan`, `kota`, `provinsi`, `telepon`) 
    VALUES (NULL, '$id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
    $query2 = $koneksi->query($sql2);

    if ($query2 == true) {
        $_SESSION["status"] = 'sukses';
        echo "<script>
        window.history.go(-1);
        </script>";
    }
} else {
    $_SESSION["status"] = 'gagal';
    $_SESSION["deskripsi"] = 'Username telah digunakan!';
    echo "<script>
        window.history.go(-1);
        </script>";
}
