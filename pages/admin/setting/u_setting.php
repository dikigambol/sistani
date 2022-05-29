<?php
session_start();
include "../../../koneksi.php";
$id = addslashes($_POST['id_pengguna']);
$nama = addslashes($_POST['nama']);
$nik = addslashes($_POST['nik']);
$gender = addslashes($_POST['gender']);
$tempatlahir = addslashes($_POST['tempat_lahir']);
$tanggallahir = addslashes($_POST['tgl_lahir']);
$alamat = addslashes($_POST['alamat']);
$rtrw = addslashes($_POST['rtrw']);
$desa = addslashes($_POST['desa']);
$kecamatan = addslashes($_POST['kecamatan']);
$kota = addslashes($_POST['kota']);
$provinsi = addslashes($_POST['provinsi']);
$telepon = addslashes($_POST['telepon']);
$password = addslashes($_POST['password']);

$pass="";

if ($password != '') {
 $pass = ", password = '$password'";   
}

$sql = "UPDATE pengguna SET nama = '$nama'$pass WHERE id_pengguna = $id";
$query = $koneksi->query($sql);
if ($query == true) {
    $_SESSION['nama'] = $nama;
    $sql2 = "UPDATE `detail_user` SET `NIK` = '$nik', `tempat_lahir` = '$tempatlahir', `tanggal_lahir` = '$tanggallahir', 
    `id_jk` = '$gender', `alamat` = '$alamat', `rt_rw` = '$rtrw', `desa` = '$desa', `kecamatan` = '$kecamatan', 
    `kota` = '$kota', `provinsi` = '$provinsi', `telepon` = '$telepon' WHERE `id_pengguna` = $id;";
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
} else {
    $_SESSION["status"] = 'gagal';
    $_SESSION["deskripsi"] = 'Redirecting...';
    echo "<script>
window.history.go(-1);
</script>";
}
