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
            case 'databagian':
                include "databagian.php";
                break;
            default:
                include "dashboard.php";
                break;
        }
    } else {
        include "dashboard.php";
    }
?>