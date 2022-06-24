    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="main.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sekolah_list.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Maklumat Sekolah
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="fasiliti_sekolah.php" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Fasiliti Sekolah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="interim_list.php" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Internet Interim
              </p>
            </a>
          </li>
          
          <?php if($_SESSION['UKIDRole']==1){ ?>
          <li class="nav-item">
            <a href="staff_list.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Maklumat Kakitangan
              </p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="laporan.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akaun Pengguna
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="utiliti/logout.php" class="nav-link">
              <i class="nav-icon fas fa-times"></i>
              <p>
                Log Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>