<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Karyawan Baru</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
  </div>

    <div>
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label class="form-label">Nomor Induk Karyawan</label>
            <input type="text" class="form-control" id="nik" placeholder="Enter NIK" name="nik">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="namakaryawan" placeholder="Enter Nama Karyawan" name="nama_karyawan">
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jeniskelamin" placeholder="Enter Jenis Kelamin" name="jenis_kelamin">
        </div>
        <div class="mb-3">
            <label class="form-label">Status Menikah</label>
            <input type="text" class="form-control" id="statusmenikah" placeholder="Enter Status" name="status_menikah">
        </div>
        <button type="submit" name="input" class="btn btn-primary">Submit</button>
    </form>
    </div>

<?php 
    include_once "../database/koneksi.php";

    if (isset($_POST['input'])) {
        $nik = $_POST['nik'];
        $nama_karyawan = $_POST['nama_karyawan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $status_menikah = $_POST['status_menikah'];

        $insertSQL = "INSERT INTO karyawan VALUES (NULL, ?, ?, ?, ?)";

        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($insertSQL);
        $statement->bindParam(1, $nik);
        $statement->bindParam(2, $nama_karyawan);
        $statement->bindParam(3, $jenis_kelamin);
        $statement->bindParam(4, $status_menikah);
        $statement->execute();

        ?>
        <script type="text/javascript">
            alert("Input Data Sukses !")
            window.location="?page=karyawan";
        </script>
        <?php
    }
?>

</main>

