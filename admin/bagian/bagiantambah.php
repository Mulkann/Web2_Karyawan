<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Bagian Baru</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
  </div>

    <div>
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Bagian</label>
            <select class="form-select" aria-label="Default select example" name="bagian" required>
                <option value="" selected >Pilih Bagian</option>
                <option value="Pemasaran">Pemasaran</option>
                <option value="Pengiklanan">Pengiklanan</option>
                <option value="Gudang">Gudang</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <select class="form-select" aria-label="Default select example" name="nama_karyawan" required>
                <option value="" selected >Pilih Nama Karyawan</option>
                <?php 
                    include_once "../database/koneksi.php";
                    $tampilkaryawan = "SELECT * FROM karyawan";
                    $database = new Database();
                    $connection = $database->getConnection();
                    $statement = $connection->prepare($tampilkaryawan);
                    $statement->execute();

                        while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=$data[nama_karyawan]>$data[nama_karyawan]</option>";
                        }
                ?>
            </select>
        </div>
        <button type="submit" name="input" class="btn btn-primary">Submit</button>
    </form>
    </div>

<?php 
    include_once "../database/koneksi.php";

    if (isset($_POST['input'])) {
        $bagian = $_POST['bagian'];
        $nama_karyawan = $_POST['nama_karyawan'];

        $insertSQL = "INSERT INTO databagian VALUES (NULL, ?, ?)";

        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($insertSQL);
        $statement->bindParam(1, $bagian);
        $statement->bindParam(2, $nama_karyawan);
        $statement->execute();

        ?>
        <script type="text/javascript">
            alert("Input Data Sukses !")
            window.location="?page=databagian";
        </script>
        <?php
    }
?>

</main>

