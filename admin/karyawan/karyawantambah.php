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
            <input type="text" class="form-control" id="nik" placeholder="Enter NIK" name="nik" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="namakaryawan" placeholder="Enter Nama Karyawan" name="nama_karyawan" required>
        </div>
        <div>
            <label class="form-label">Jenis Kelamin</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin" required>
            <label class="form-check-label" for="jenis_kelamin">
                Laki-laki
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" id="jenis_kelamin">
            <label class="form-check-label" for="jenis_kelamin">
                Perempuan
            </label>
        </div><br>
        <div class="mb-3">
            <label class="form-label">Status Menikah</label>
            <select class="form-select" aria-label="Default select example" name="status_menikah" required>
                <option value="" selected >Pilih Status</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah Anak 0">Menikah Anak 0</option>
                <option value="Menikah Anak 1">Menikah Anak 1</option>
                <option value="Menikah Anak 2">Menikah Anak 2</option>
            </select>
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

