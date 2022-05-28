<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Data Bagian</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      <?php 
        include_once "../database/koneksi.php";

        $id = $_GET['id'];
        $findSQL = "SELECT * FROM databagian WHERE id = ?";
        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($findSQL);
        $statement->bindParam(1, $id);
        $statement->execute();
        $data = $statement->fetch();

        if (isset($_POST['input'])) {
            $id = $_POST['id'];
            $bagian = $_POST['bagian'];
            $nama_karyawan = $_POST['nama_karyawan'];
    
            $updateSQL = "UPDATE `databagian` SET `bagian` = ?, `nama_karyawan` = ? WHERE `databagian`.`id` = ?";
    
            $database = new Database();
            $connection = $database->getConnection();
            $statement = $connection->prepare($updateSQL);
            $statement->bindParam(1, $bagian);
            $statement->bindParam(2, $nama_karyawan);
            $statement->bindParam(3, $id);
            $statement->execute();
    
            ?>
            <script type="text/javascript">
                alert("Update Data Sukses !")
                window.location="?page=databagian";
            </script>
            <?php
        }
        ?>

      </div>
  </div>

    <div>
    <form action="" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $data['id']?>" readonly>
        <div class="mb-3">
            <label class="form-label">Bagian</label>
            <select class="form-select" aria-label="Default select example" name="bagian" required>
                <option value="">Pilih Bagian</option>
                <option value="Pemasaran" <?php echo ($data['bagian'] == 'Pemasaran') ? "selected" : "" ?> >Pemasaran</option>
                <option value="Pengiklanan" <?php echo ($data['bagian'] == 'Pengiklanan') ? "selected" : "" ?> >Pengiklanan</option>
                <option value="Gudang" <?php echo ($data['bagian'] == 'Gudang') ? "selected" : "" ?> >Gudang</option>
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

</main>

