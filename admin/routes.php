<?php 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page) {
            case '':
                include "dashboard.php";
                break;
            case 'karyawan':
                include "karyawan/karyawan.php";
                break;
            case 'karyawantambah':
                include "karyawan/karyawantambah.php";
                break;
            case 'karyawanedit':
                include "karyawan/karyawanedit.php";
                break;
            case 'karyawanhapus':
                include "karyawan/karyawanhapus.php";
                break;
            case 'databagian':
                include "bagian/databagian.php";
                break;
            case 'bagiantambah':
                include "bagian/bagiantambah.php";
                break;
            case 'bagianedit':
                include "bagian/bagianedit.php";
                break;
            case 'bagianhapus':
                include "bagian/bagianhapus.php";
                break;
            default:
                include "dashboard.php";
                break;
        }
    } else {
        include "dashboard.php";
    }
?>