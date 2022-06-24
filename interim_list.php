<?php 
include 'utiliti/data.php';
include('header.php'); 

$where="";
if($_SESSION['UKIDRole']==1){
  $where = "";
}
else if($_SESSION['UKIDRole']==2){
  $where = "tbl_sekolah.sek_ppd_id = ".$_SESSION['UKIDPPD'];
}
else{
  $where = "tbl_internet_interim.inter_sek_id = ".$_SESSION['UKIDSekolah'];
}

$list = new data();
$list->select("
tbl_internet_interim
INNER JOIN tbl_sekolah ON tbl_internet_interim.inter_sek_id = tbl_sekolah.sekolah_id",
"tbl_internet_interim.interim_id,
tbl_sekolah.sek_nama,
tbl_sekolah.sek_ppd_id,
tbl_internet_interim.inter_jenis,
tbl_internet_interim.inter_kuantiti,
tbl_internet_interim.inter_bulan,
tbl_internet_interim.inter_file", $where );
$interim = $list->sql;

// $lsjenis = new data();
// $lsjenis->select("tbl_jenis_sekolah");
// $jenis = $lsjenis->sql;
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
            <h1>Senarai Penghantaran Borang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengantaran</li>
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
              <button type="button" name="add" id="add" class="btn btn-success">Muat naik</button>  
          </div>  
          <br />
          <div id="interim_table">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="5%" class="text-center">Bil.</th>
                  <th width="35%">Sekolah</th>
                  <th width="10%" class="text-center">Jenis</th>
                  <th width="10%" class="text-center">Bil. Talian</th>
                  <th width="10%" class="text-center">Bulan</th>
                  <th width="20%">Fail</th>
                  <th width="10%">#</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $bil=1;
                if($interim->num_rows > 0 ){
                while($row = mysqli_fetch_assoc($interim)){
              ?>
                <tr>
                    <td class="text-center"><?php echo $bil++; ?></td>
                    <td><?php echo $row['sek_nama']; ?></td>
                    <td><?php echo $row['inter_jenis']; ?></td>
                    <td><?php echo $row['inter_kuantiti']; ?></td>
                    <td><?php echo $row['inter_bulan']; ?></td>
                    <td><a href="files/<?php echo $row['inter_file']; ?>" target="_blank"><?php echo $row['inter_file']; ?></a></td>
                    <td>
                      <a href="#" id="<?php echo $row['interim_id']; ?>" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                          <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" id="<?php echo $row['interim_id']; ?>" class="btn btn-xs btn-danger del_data" title="Padam">
                          <i class="fas fa-trash"></i>
                      </a>
                    </td>
                </tr>
              <?php
                } }
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

  <!-- MODAL -->
  <div id="dataModal" class="modal fade">  
    <div class="modal-dialog">  
      <div class="modal-content">  
        <div class="modal-header">  
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="modal-title">Maklumat Interim</h4>  
        </div>  
        <div class="modal-body" id="school_details">  
        </div>  
        <div class="modal-footer">  
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>  
        </div>  
      </div>  
    </div>  
  </div> 

  <div class="modal fade" id="add_interim">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" action="" method="post" id="insert_form">
          <input type="hidden" name="interim_id" id="interim_id">
          <div class="modal-header">
            <h4 class="modal-title">Muat naik Maklumat Interim</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="inter_bulan" class="form-label">Bulan</label>            
                  <select class="form-control select2" id="inter_bulan" name="inter_bulan" style="width: 100%;">
                    <option selected="selected" value="">--Sila  pilih--</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Mac">Mac</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Jun">Jun</option>
                    <option value="Julai">Julai</option>
                    <option value="Ogos">Ogos</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Disember">Disember</option>
                  </select>
                </div>
              </div>              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="inter_jenis" class="form-label">Jenis</label>            
                  <select class="form-control select2" id="inter_jenis" name="inter_jenis" style="width: 100%;">
                    <option selected="selected" value="">--Sila  pilih--</option>
                    <option value="Celcom">Celcom</option>
                    <option value="Maxis">Maxis</option>
                    <option value="TM">TM</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="inter_jenis" class="form-label">Bilangan Talian</label>
                  <input type="text" class="form-control" name="inter_kuantiti" id="inter_kuantiti">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="exampleInputFile">Fail</label>
                  <div class="input-group">                    
                    <div class="custom-file">
                      <input type="file" name="inter_file" class="custom-file-input" id="inter_file">
                      <label class="custom-file-label" for="exampleInputFile">Pilih fail</label><br>
                      <!-- <div id="linkfile"></div><br> -->
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile" id="linkfile"></label>
                </div>
              </div>
            </div> 
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger" id="insert">Muat naik</button>
          </div> 
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="padam_interim">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form class="form-horizontal" action="" method="post" id="delete_form">
          <div class="modal-header">
            <h4 class="modal-title">Padam Rekod</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Adakah anda pasti?</p>
            <input type="hidden" name="del_interim_id" id="del_interim_id">
            <input type="hidden" name="del_action" value="Padam">
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <button type="submit" id="btn_del_sekolah" class="btn btn-danger">Ya</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

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

<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
$(document).ready(function(){ 
  $('#add').click(function(){  
    $('#insert').html("Tambah");  
    $('#insert_form')[0].reset(); 
    $('#add_interim').modal('show');  
  });
  
  // DELETE RECORD
  $(document).on('click', '.del_data', function(){ 
    var interim_id = $(this).attr("id");
    $('#delete_form')[0].reset();    
    $('#del_interim_id').val(interim_id);
    $('#padam_interim').modal('show');  
  }); 
  
  $(document).on('click', '.edit_data', function(){  
    var interim_id = $(this).attr("id");  
    // alert(interim_id);
    $.ajax({  
      url:"utiliti/data_interim.php",  
      method:"POST",  
      data:{interim_id:interim_id},  
      dataType: "json",  
      success:function(data){ 
        $('#interim_id').val(data.interim_id); 
        $('#inter_bulan').val(data.inter_bulan);  
        $('#linkfile').html(data.inter_file);  
        $('#inter_jenis').val(data.inter_jenis);
        $('#inter_kuantiti').val(data.inter_kuantiti); 
        $('#insert').html("Kemaskini");  
        $('#add_interim').modal('show');  
      }  
    });  
  });  
  $('#insert_form').on("submit", function(event){  
    event.preventDefault();  
    if($('#inter_bulan').val() == "")  
    {  
      alert("Sila pilih bulan");  
    }  
    else if($('#inter_jenis').val() == '')  
    {  
      alert("Sila pilih Jenis");  
    } 
    if($('#inter_file').val() == "")  
    {  
      alert("Sila masukkan fail");  
    }
    if($('#inter_kuantiti').val() == "")  
    {  
      alert("Sila masukkan kuantiti talian");  
    }   
    else  
    {  
      $.ajax({  
        url:"utiliti/interim_controller.php",
        // contentType: 'multipart/form-data',
        method:"POST",
        // data:$('#insert_form').serialize(),
        data: new FormData( this ),
        processData: false,
        contentType: false,
        beforeSend:function(data){  
          $('#insert').html("Muat naik");
          if(data.interim_id==''){
            mesej = 'Rekod berjaya dimuat naik';
          }
          else{
            mesej = 'Rekod berjaya dikemaskini';
          } 
        },  
        success:function(data){  
          $('#insert_form')[0].reset();  
          $('#add_interim').modal('hide');  
          $('#interim_table').html(data); 
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
      url:"utiliti/interim_controller.php",  
      method:"POST",  
      data:$('#delete_form').serialize(),   
      success:function(data){  
        $('#delete_form')[0].reset();  
        $('#padam_interim').modal('hide');  
        $('#interim_table').html(data);
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); 
        toastr.error('Rekod berjaya dipadam');

      }  
    });   
  });   
});  
</script>


<?php include('bottom_footer.php'); ?>