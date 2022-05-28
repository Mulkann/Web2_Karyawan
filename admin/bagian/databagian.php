
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Bagian</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
  </div>
  <div class="table-responsive">
    <a href="?page=bagiantambah" class="btn btn-success mb-3"><span data-feather="plus"></span>Data Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Bagian</th>
              <th scope="col">Nama</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $selectSQL = "SELECT * FROM databagian";
              $database = new Database();
              $connection = $database->getConnection();
              $statement = $connection->prepare($selectSQL);
              $statement->execute();
              $no = 1;

              while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
              
            ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $data["bagian"] ?></td>
              <td><?php echo $data["nama_karyawan"] ?></td>
              <td>
                <a href="?page=bagianedit&id=<?php echo $data['id'];?>" class="badge bg-info">
                  <span data-feather="refresh-ccw"></span>
                </a>
                <a href="?page=bagianhapus&id=<?php echo $data['id'];?>" class="badge bg-danger">
                  <span data-feather="x-circle"></span>
                </a>
              </td>
            </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
      </div>
</main>