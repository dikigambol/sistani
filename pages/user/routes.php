<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
    case 'thread':
        include "thread/v_thread.php";
        break;
    case 'jadwal':
        include "jadwal/v_jadwal.php";
        break;
    case 'ubahprofil':
        include "akun/u_akun.php";
        break;
    default:
        include "akun/v_akun.php";
}
