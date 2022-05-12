
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Karyawan</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
  </div>
  <div class="table-responsive">
    <a href="?page=karyawantambah" class="btn btn-success mb-3"><span data-feather="plus"></span>Data Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIK</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Status Menikah</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $selectSQL = "SELECT * FROM karyawan";
              $database = new Database();
              $connection = $database->getConnection();
              $statement = $connection->prepare($selectSQL);
              $statement->execute();
              $no = 1;

              while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
              
            ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $data["nik"] ?></td>
              <td><?php echo $data["nama_karyawan"] ?></td>
              <td><?php echo $data["jenis_kelamin"] ?></td>
              <td><?php echo $data["status_menikah"] ?></td>
              <td>
                <button class="btn btn-danger btn-sm">
                  <span data-feather="x-circle"></span>
                </button>
                <button class="btn btn-info btn-sm">
                  <span data-feather="refresh-ccw"></span>
                </button>
              </td>
            </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
      </div>
</main>