
<?php 
include('utiliti/data.php');
include('utiliti/include.php');
include('header.php');
$SUser = new data();    
$SUser->select("tbl_pengguna
INNER JOIN tbl_pengguna_role ON tbl_pengguna.user_id = tbl_pengguna_role.pr_user_id
INNER JOIN tbl_sekolah ON tbl_pengguna_role.pr_sekolah_id = tbl_sekolah.sekolah_id",
"tbl_pengguna.user_id,
tbl_pengguna.user_nama,
tbl_pengguna.user_pass,
tbl_pengguna.user_nokp,
tbl_pengguna.user_phone,
tbl_pengguna.user_email,
tbl_pengguna.user_gambar,
tbl_pengguna_role.pr_role,
tbl_sekolah.sek_nama",
" user_id = '".$_SESSION['UKIDLogin']."' ");
$user = $SUser->sql;
$rowuser = mysqli_fetch_assoc($user);

//COUT FASILITY
$where="";
if($_SESSION['UKIDRole']==1){
  $where = "";
}
else if($_SESSION['UKIDRole']==2){
  $where = " tbl_sekolah.sek_ppd_id = ".$_SESSION['UKIDPPD'];
}
else{
  $where = " tbl_sekolah.sekolah_id = ".$_SESSION['UKIDSekolah'];
}

$cschl = new data();
$cschl->select("tbl_sekolah"," COUNT(tbl_sekolah.sekolah_id) AS bilangan ", $where );
$rowcshl = mysqli_fetch_assoc($cschl->sql);
$bilsekolah = $rowcshl['bilangan'];


$stat = new data();
$stat->select("
tbl_sekolah_fasiliti
INNER JOIN tbl_sekolah ON tbl_sekolah_fasiliti.fas_sek_id = tbl_sekolah.sekolah_id",
"SUM(if(tbl_sekolah_fasiliti.fas_jenis='Bilik Komputer',1,0)) AS bilKomp,
SUM(if(tbl_sekolah_fasiliti.fas_jenis='Makmal Komputer',1,0)) AS makKomp,
SUM(if(tbl_sekolah_fasiliti.fas_jenis='Pusat Akses',1,0)) AS pusAkses", $where);
$statistik = $stat->sql;
$curstat = mysqli_fetch_assoc($statistik);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $bilsekolah; ?></h3>

              <p>Jumlah Sekolah</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $curstat['bilKomp']; ?></h3>
              <p>Bilik Komputer</p>
            </div>
            <div class="icon">
              <i class="ion ion-laptop"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $curstat['makKomp']; ?></h3>
              <p>Makmal Komputer</p>
            </div>
            <div class="icon">
              <i class="ion ion-laptop"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $curstat['pusAkses']; ?></h3>
              <p>Pusat Akses</p>
            </div>
            <div class="icon">
              <i class="ion ion-wifi"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php
                  if(($rowuser['user_gambar'])==null){
                    $gambar = 'unknown_user.jpg';
                  }
                  else{
                    $gambar = $rowuser['user_gambar'];
                  }
                  ?>
                  <img class="profile-user-img img-fluid img-circle"
                       src="files/profil/<?php echo $gambar; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo strtoupper($rowuser['user_nama']); ?></h3>

                <p class="text-muted text-center"><?php echo userRole($rowuser['pr_role']); ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item text-center">
                    <?php echo $rowuser['sek_nama']; ?>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#sekolah" data-toggle="tab">Carta Fasiliti</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Kemaskini Profil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="sekolah">
                    <!-- <div class="row">  -->
                    <div class="card">
                      <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- </div> -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="utiliti/profil_controller.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="oldpass" value="<?php echo $rowuser['user_pass']; ?>">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="user_nama" id="user_nama" value="<?php echo $rowuser['user_nama']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">No. Telefon</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="user_phone" id="user_phone" value="<?php echo $rowuser['user_phone']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">E-Mel</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $rowuser['user_email']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Katalaluan</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="user_pass" id="user_pass" value="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-sm-9">
                          <div class="input-group">                    
                            <div class="custom-file">
                              <input type="file" name="user_gambar" class="custom-file-input" id="user_gambar">
                              <label class="custom-file-label" for="exampleInputFile"><?php echo $rowuser['user_gambar'] ? $rowuser['user_gambar']: 'Pilih fail'  ?></label><br>
                              <!-- <div id="linkfile"></div><br> -->
                            </div>
                          </div>
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-danger" id="hantar">Kemaskini</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  include('upper_footer.php');
  ?>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script>
     $(function () {

      // file input name
      bsCustomFileInput.init();

      var donutData = {
        labels: [
            'Bilik Komputer',
            'Makmal Komputer',
            'Pusat Akses',
        ],
        datasets: [
          {
            data: [<?php echo $curstat['bilKomp'].','.$curstat['makKomp'].','.$curstat['pusAkses'];?>],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
          }
        ]
      }

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = donutData;
      var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }

      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })




     });
  </script>
  <?php
  include('bottom_footer.php');
  ?>