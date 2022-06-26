<?php 
include 'utiliti/data.php';
include('header.php'); 

$where="";
if($_SESSION['UKIDRole']==1){
  $where = "";
}
else if($_SESSION['UKIDRole']==2){
  $where = "sek_ppd_id = ".$_SESSION['UKIDPPD'];
}
else{
  $where = "inter_sek_id = ".$_SESSION['UKIDSekolah'];
}

$list = new data();
$list->select("vwLaporan", "*", $where);
$sekolah = $list->sql;

?>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Penghantaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
        <div class="text-right">  
            <button type="button" name="add" id="add" class="btn btn-success">Tambah</button>  
        </div>  
        <br />
        <div class="row">
          <div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th width="5%">Bil.</th>
              <th width="30%">Sekolah</th>
              <th width="5%">Jan</th>
              <th width="5%">Feb</th>
              <th width="5%">Mac</th>
              <th width="5%">Apr</th>
              <th width="5%">Mei</th>
              <th width="5%">Jun</th>
              <th width="5%">Jul</th>
              <th width="5%">Ogo</th>
              <th width="5%">Sep</th>
              <th width="5%">Okt</th>
              <th width="5%">Nov</th>
              <th width="5%">Dis</th>
          </tr>
          </thead>
          <tbody>
      <?php
        $bil=1;
        while($row = mysqli_fetch_assoc($sekolah)){         
      ?>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $row['sek_nama']; ?></td>
            <td><?php if($row['jan']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['feb']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['mac']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['apr']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['mei']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['jun']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['jul']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['ogo']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['sep']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['okt']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['nov']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
            <td><?php if($row['dis']==1) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>'; ?></td>
        </tr>
      <?php } ?>
        </tbody>
        </table>
        </div>
        </div>
      </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('upper_footer.php'); ?>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
$(document).ready(function(){ 
  $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); 
   
});  
</script>


<?php include('bottom_footer.php'); ?>