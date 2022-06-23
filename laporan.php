<?php 
include('header.php'); 
include 'utiliti/data.php';

$list = new data();
$list->select("tbl_sekolah",
"tbl_sekolah.sekolah_id,
tbl_sekolah.sek_nama");
$sekolah = $list->sql;

$lsjenis = new data();
$lsjenis->select("tbl_jenis_sekolah");
$jenis = $lsjenis->sql;
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
            <h1>Laporan Pengahantaran</h1>
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
        <div id="sekolah_table">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th width="5%">Bil.</th>
              <th width="30%">Sekolah</th>
              <th width="60%">Jenis</th>
              <th width="5%">#</th>
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
            <td>
            <ul class="pagination pagination-month justify-content-center">
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month text-danger">Jan</p>
                          <p class="page-year text-danger">2021</p>
                      </a>
                  </li>
                  <li class="page-item active">
                      <a class="page-link" href="#">
                          <p class="page-month">Feb</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Mar</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Apr</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">May</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Jun</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Jul</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Aug</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Sep</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Oct</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Nov</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Dec</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                </ul>
            </td>
            <td>
              <a href="#" id="<?php echo $row['sekolah_id']; ?>" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                  <i class="fas fa-edit"></i>
              </a>
            </td>
        </tr>

      <?php
        }

      ?>
        </tbody>
        </table>
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
  $('#add').click(function(){  
    $('#insert').html("Tambah");  
    $('#insert_form')[0].reset(); 
    $('#add_sekolah').modal('show');  
  });
  
  // DELETE RECORD
  $(document).on('click', '.del_data', function(){ 
    var sekolah_id = $(this).attr("id");
    $('#delete_form')[0].reset();    
    $('#del_sekolah_id').val(sekolah_id);
    $('#padam_sekolah').modal('show');  
  }); 
  
  $(document).on('click', '.edit_data', function(){  
    var sekolah_id = $(this).attr("id");  
    // alert(sekolah_id);
    $.ajax({  
      url:"utiliti/data_sekolah.php",  
      method:"POST",  
      data:{sekolah_id:sekolah_id},  
      dataType: "json",  
      success:function(data){ 
        $('#sekolah_id').val(data.sekolah_id); 
        $('#kod_sekolah').val(data.sek_kod);  
        $('#nama_sekolah').val(data.sek_nama);  
        $('#jenis').val(data.sek_jenis);  
        $('#ptj').val(data.sek_ptj);  
        $('#lokasi').val(data.sek_lokasi);  
        $('#alamat_baris1').val(data.sek_alamat1); 
        $('#alamat_baris2').val(data.sek_alamat2); 
        $('#alamat_baris3').val(data.sek_alamat3);  
        $('#poskod').val(data.sek_poskod); 
        $('#daerah').val(data.sek_daerah_id); 
        $('#negeri').val(data.sek_negeri_id); 
        $('#ppd').val(data.sek_ppd_id); 
        $('#no_telefon').val(data.sek_phone); 
        $('#emel').val(data.sek_emel); 
        $('#insert').html("Kemaskini");  
        $('#add_sekolah').modal('show');  
      }  
    });  
  });  
  $('#insert_form').on("submit", function(event){  
    event.preventDefault();  
    if($('#kod_sekolah').val() == "")  
    {  
      alert("Sila masukkan Kod Sekolah");  
    }  
    else if($('#nama_sekolah').val() == '')  
    {  
      alert("Sila masukkan Nama Sekolah");  
    }  
    else if($('#jenis').val() == '')  
    {  
      alert("Sila pilih Jenis Sekolah");  
    }  
    else if($('#ptj').val() == '')  
    {  
      alert("Adakah Sekolah sebagai PTJ?");  
    }
    else if($('#lokasi').val() == '')  
    {  
      alert("Sila pilih Lokasi?");  
    }
    else if($('#alamat_baris1').val() == '')  
    {  
      alert("Sila masukkan sekurang-kurangnya alamat baris 1");  
    } 
    else if($('#daerah').val() == '')  
    {  
      alert("Sila pilih Daerah");  
    }
    else if($('#negeri').val() == '')  
    {  
      alert("Sila pilih Negeri");  
    }
    else if($('#ppd').val() == '')  
    {  
      alert("Sila pilih PPD");  
    }   
    else  
    {  
      $.ajax({  
        url:"utiliti/sekolah_controller.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),
        beforeSend:function(data){  
          $('#insert').html("Tambah");
          if(data.sekolah_id==''){
            mesej = 'Rekod berjaya ditambah';
          }
          else{
            mesej = 'Rekod berjaya dikemaskini';
          } 
        },  
        success:function(data){  
          $('#insert_form')[0].reset();  
          $('#add_sekolah').modal('hide');  
          $('#sekolah_table').html(data); 
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          toastr.success(mesej);
        }  
      });  
    }  
  }); 
  $('#delete_form').on("submit", function(event){  
    event.preventDefault();   
    $.ajax({  
      url:"utiliti/sekolah_controller.php",  
      method:"POST",  
      data:$('#delete_form').serialize(),   
      success:function(data){  
        $('#delete_form')[0].reset();  
        $('#padam_sekolah').modal('hide');  
        $('#sekolah_table').html(data);
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); 
        toastr.error('Rekod berjaya dipadam');

      }  
    });   
  });
  $(document).on('click', '.view_data', function(){  
    var employee_id = $(this).attr("id");  
    if(employee_id != '')  
    {  
      $.ajax({  
        url:"select.php",  
        method:"POST",  
        data:{employee_id:employee_id},  
        success:function(data){  
          $('#employee_detail').html(data);  
          $('#dataModal').modal('show');  
        }  
      });  
    }            
  }); 
   
});  
</script>


<?php include('bottom_footer.php'); ?>