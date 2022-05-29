<?php
session_start();
include "../../../koneksi.php";

$id = addslashes($_POST['id_user']);
$idkeltani = addslashes($_POST['id_keltani']);

$sqlCek = "SELECT `id_user` FROM `anggota` WHERE `id_kelompok_tani` = $idkeltani AND `jabatan` = 'ketua'";
$queryCek = $koneksi->query($sqlCek);
$cek = mysqli_num_rows($queryCek);
$data = $queryCek->fetch_array();
$idKetuaLama = $data['id_user'];

if ($cek == 1) {
    $sql = "UPDATE `anggota` SET `jabatan` = 'anggota' WHERE `id_user` = $idKetuaLama;";
    $query = $koneksi->query($sql);
    if ($query == true) {
        $sql2 = "UPDATE `anggota` SET `jabatan` = 'ketua' WHERE `id_user` = $id;";
        $query2 = $koneksi->query($sql2);
        if ($query2 == true) {
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
    }
}
