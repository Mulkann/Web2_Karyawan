<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link <?php echo $_GET['page'] == 'dashboard' ? 'active' : '' ?>" aria-current="page" href="?page=dashboard">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $_GET['page'] == 'karyawan' ? 'active' : '' ?>" href="?page=karyawan">
                <span data-feather="users"></span>
                Data Karyawan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $_GET['page'] == 'databagian' ? 'active' : '' ?>" href="?page=databagian">
                <span data-feather="layers"></span>
                Data Bagian
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">
                <span data-feather="chevrons-left"></span>
                Log Out
              </a>
            </li>
          </ul>
        </div>
      </nav>