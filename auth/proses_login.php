<?php
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_GET['type'];
if ($type == "login") {
    $sql = "SELECT * FROM pengguna INNER JOIN level_user 
    ON pengguna.id_level = level_user.id_level where pengguna.username = '$username' 
    AND pengguna.password = '$password';";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['id_user'] = $data['id_pengguna'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['nama_level'];
        $_SESSION['isLogin'] = 'logged';
        $level = $data['nama_level'] ?? "";
        if ($level == "admin desa") {
            header("location:../dashboard-admin.php");
        } else {
            header("location:../dashboard-user.php");
        }
    } else {
        $_SESSION["status"] = 'gagal';
        header("location:../index.php");
    }
} else if ($type == "logout") {
    unset($_SESSION['isLogin']);
    unset($_SESSION['nama']);
    unset($_SESSION['id_user']);
    unset($_SESSION['level']);
    header("location:../index.php");
}
