<?php

    include_once "../database/koneksi.php";

    $id = $_GET['id'];
    $deleteSQL = "DELETE FROM `karyawan` WHERE `karyawan`.`id` = ?";

    $database = new Database();
    $connection = $database->getConnection();
    $statement = $connection->prepare($deleteSQL);
    $statement->bindParam(1, $id);
    $statement->execute();

?>

<script type="text/javascript">
    alert("Hapus Data Sukses !")
    window.location="?page=karyawan";
</script>