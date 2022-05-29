<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
    case 'pengguna':
        include "pengguna/v_pengguna.php";
        break;
    case 'detailprofil':
        include "pengguna/detail_pengguna.php";
        break;
    case 'daerah':
        include "daerah/v_daerah.php";
        break;
    case 'thread':
        include "thread/v_thread.php";
        break;
    case 'keltani':
        include "kelompokTani/v_keltani.php";
        break;
    case 'detailkeltani':
        include "kelompokTani/detail_keltani.php";
        break;
    case 'bantuan':
        include "bantuan/v_bantuan.php";
        break;
    case 'detailbantuan':
        include "bantuan/detail_bantuan.php";
        break;
    case 'setting':
        include "setting/v_setting.php";
        break;
    default:
        include "home/home.php";
}
