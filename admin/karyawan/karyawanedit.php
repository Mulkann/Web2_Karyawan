<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Data Karyawan</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      <?php 
        include_once "../database/koneksi.php";

        $id = $_GET['id'];
        $findSQL = "SELECT * FROM karyawan WHERE id = ?";
        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($findSQL);
        $statement->bindParam(1, $id);
        $statement->execute();
        $data = $statement->fetch();

        if (isset($_POST['input'])) {
            $id = $_POST['id'];
            $nik = $_POST['nik'];
            $nama_karyawan = $_POST['nama_karyawan'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $status_menikah = $_POST['status_menikah'];
    
            $updateSQL = "UPDATE `karyawan` SET `nik` = ?, `nama_karyawan` = ?, `jenis_kelamin` = ?, `status_menikah` = ? WHERE `karyawan`.`id` = ?";
    
            $database = new Database();
            $connection = $database->getConnection();
            $statement = $connection->prepare($updateSQL);
            $statement->bindParam(1, $nik);
            $statement->bindParam(2, $nama_karyawan);
            $statement->bindParam(3, $jenis_kelamin);
            $statement->bindParam(4, $status_menikah);
            $statement->bindParam(5, $id);
            $statement->execute();
    
            ?>
            <script type="text/javascript">
                alert("Update Data Sukses !")
                window.location="?page=karyawan";
            </script>
            <?php
        }
        ?>

      </div>
  </div>

    <div>
    <form action="" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $data['id']?>" readonly>
        <div class="mb-3 mt-3">
            <label class="form-label">Nomor Induk Karyawan</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik']?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="namakaryawan" name="nama_karyawan" value="<?php echo $data['nama_karyawan']?>" required>
        </div>
        <div>
            <label class="form-label">Jenis Kelamin</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? "checked" : "" ?> required>
            <label class="form-check-label" for="jenis_kelamin">
                Laki-laki
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" id="jenis_kelamin" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? "checked" : "" ?> >
            <label class="form-check-label" for="jenis_kelamin">
                Perempuan
            </label>
        </div><br>
        <div class="mb-3">
            <label class="form-label">Status Menikah</label>
            <select class="form-select" aria-label="Default select example" name="status_menikah" required>
                <option value="">Pilih Status</option>
                <option value="Belum Menikah" <?php echo ($data['status_menikah'] == 'Belum Menikah') ? "selected" : "" ?> >Belum Menikah</option>
                <option value="Menikah Anak 0" <?php echo ($data['status_menikah'] == 'Menikah Anak 0') ? "selected" : "" ?> >Menikah Anak 0</option>
                <option value="Menikah Anak 1" <?php echo ($data['status_menikah'] == 'Menikah Anak 1') ? "selected" : "" ?> >Menikah Anak 1</option>
                <option value="Menikah Anak 2" <?php echo ($data['status_menikah'] == 'Menikah Anak 2') ? "selected" : "" ?> >Menikah Anak 2</option>
            </select>
        </div>
        <button type="submit" name="input" class="btn btn-primary">Submit</button>
    </form>
    </div>

</main>

