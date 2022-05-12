<?php 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page) {
            case '':
                include "dashboard.php";
                break;
            case 'karyawan':
                include "karyawan.php";
                break;
            case 'karyawantambah':
                include "karyawantambah.php";
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