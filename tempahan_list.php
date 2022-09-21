<?php 
include 'utiliti/data.php';
include 'utiliti/include.php';
include('header.php'); 

$where="";
if($_SESSION['UKIDRole']==1){
  $where = "";
}
else if($_SESSION['UKIDRole']==2){
  $where = "tbl_sekolah.sek_ppd_id = ".$_SESSION['UKIDPPD'];
}
else{
  $where = "tbl_sekolah.sekolah_id = ".$_SESSION['UKIDSekolah'];
}

$list = new data();
$list->select("
tbl_tempahan
INNER JOIN tbl_sekolah_fasiliti ON tbl_tempahan.temp_fasiliti_id = tbl_sekolah_fasiliti.fasiliti_id
INNER JOIN tbl_sekolah ON tbl_sekolah_fasiliti.fas_sek_id = tbl_sekolah.sekolah_id",
"tbl_tempahan.tempahan_id,
tbl_tempahan.temp_kegunaan,
tbl_tempahan.temp_sdate,
tbl_tempahan.temp_edate,
tbl_tempahan.temp_status,
tbl_sekolah_fasiliti.fas_nama,
tbl_sekolah.sek_ppd_id,
tbl_sekolah_fasiliti.fas_sek_id", $where);
$tempahan = $list->sql;

$lsfasiliti = new data();
$lsfasiliti->select("tbl_sekolah_fasiliti","*"," fas_sek_id = ".$_SESSION['UKIDSekolah'] );
$fasiliti = $lsfasiliti->sql;
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Senarai Tempahan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tempahan</li>
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
      <?php
      if($_SESSION['UKIDRole']!=3){ ?>
    
        <div class="text-right">  
            <button type="button" name="add" id="add" class="btn btn-success">Tambah</button>  
        </div>
      <?php } ?>  
        <br />
        <div id="tempahan_table">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th width="5%">Bil</th>
              <th width="25%">Fasiliti</th>
              <th width="30%">Kegunaan</th>
              <th width="10%">Mula</th>
              <th width="10%">Tamat</th>
              <th width="10%">Status</th>
              <th width="10%">#</th>
          </tr>
          </thead>
          <tbody>
      <?php
        $bil=1;
        if($tempahan->num_rows > 0){
          while($row = mysqli_fetch_assoc($tempahan)){
      ?>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $row['fas_nama']; ?></td>
            <td><?php echo $row['temp_kegunaan']; ?></td>
            <td><?php echo date('d-m-Y H:i', strtotime($row['temp_sdate'])); ?></td>
            <td><?php echo date('d-m-Y H:i', strtotime($row['temp_edate'])); ?></td>
            <td><?php echo tempahanStatus($row['temp_status']); ?></td>
            <td>
              <a href="#" id="<?php echo $row['tempahan_id']; ?>" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                  <i class="fas fa-edit"></i>
              </a>
              <a href="#" id="<?php echo $row['tempahan_id']; ?>" class="btn btn-xs btn-danger del_data" title="Padam">
                  <i class="fas fa-trash"></i>
              </a>
            </td>
        </tr>

      <?php
          }
        } else{
          echo '<tr><td class="text-center" colspan="7"><i>Tiada Rekod</i></td></tr>';
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

  <!-- MODAL -->
  <div class="modal fade" id="add_tempahan">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" action="" method="post" id="insert_form">
          <input type="hidden" name="tempahan_id" id="tempahan_id">
          <div class="modal-header">
            <h4 class="modal-title">Maklumat Tempahan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="temp_fasiliti_id" class="col-sm-3 col-form-label">Fasiliti</label>
              <div class="col-sm-9">
                <select class="form-control select2" id="temp_fasiliti_id" name="temp_fasiliti_id" style="width: 100%;">
                  <option selected="selected" value="">--Sila  pilih--</option>
                  <?php
                  while($row = mysqli_fetch_assoc($fasiliti)){
                    echo '<option value="'.$row['fasiliti_id'].'">'.$row['fas_nama'].'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_telefon" class="col-sm-3 col-form-label">Tujuan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="temp_kegunaan" name="temp_kegunaan">
              </div>
            </div>
            <div class="form-group row">              
              <label for="poskod" class="col-sm-3 col-form-label">Tarikh</label>               
              <div class="col-sm-9 mt-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="temp_comdate" name="temp_comdate">
                  </div>
                <!-- <input type="text" class="form-control" id="temp_sdate" name="temp_sdate" placeholder="Tarikh Mula"> -->
              </div>               
            </div>
            <div class="form-group row">              
              <label for="poskod" class="col-sm-3 col-form-label">Status</label>               
              <div class="col-sm-5 mt-1">
                <select class="form-control select2" id="temp_status" name="temp_status" style="width: 100%;">
                  <option value="1">Baru</option>
                  <option value="2">Sah</option>
                  <option value="3">Tidak Sah</option>
                  <option value="4">Batal</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger" id="insert">Simpan</button>
          </div> 
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="padam_tempahan">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form class="form-horizontal" action="" method="post" id="delete_form">
          <div class="modal-header">
            <h4 class="modal-title">Padam Tempahan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Adakah anda pasti?</p>
            <input type="hidden" name="del_tempahan_id" id="del_tempahan_id">
            <input type="hidden" name="del_action" value="Padam">
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <button type="submit" id="btn_del_tempahan" class="btn btn-danger">Ya</button>
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

<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<script>

$(document).ready(function(){ 
  $('#add').click(function(){  
    $('#insert').html("Tambah");  
    $('#insert_form')[0].reset(); 
    $('#add_tempahan').modal('show');  
  });
  
  // DELETE RECORD
  $(document).on('click', '.del_data', function(){ 
    var tempahan_id = $(this).attr("id");
    $('#delete_form')[0].reset();    
    $('#del_tempahan_id').val(tempahan_id);
    $('#padam_tempahan').modal('show');  
  }); 
  
  $(document).on('click', '.edit_data', function(){  
    var tempahan_id = $(this).attr("id");
    $.ajax({  
      url:"utiliti/data_tempahan.php",  
      method:"POST",  
      data:{tempahan_id:tempahan_id},
      dataType: "json",  
      success:function(data){ 
        $('#tempahan_id').val(data.tempahan_id); 
        $('#temp_fasiliti_id').val(data.temp_fasiliti_id);  
        $('#temp_kegunaan').val(data.temp_kegunaan);  
        $('#temp_comdate').val(data.combdate);
        $('#temp_status').val(data.temp_status);
        $('#insert').html("Kemaskini");  
        $('#add_tempahan').modal('show');  
      }  
    });  
  });  
  $('#insert_form').on("submit", function(event){  
    event.preventDefault();  
    if($('#temp_fasiliti_id').val() == "")  
    {  
      alert("Sila pilih Fasiliti");  
    }  
    else if($('#temp_kegunaan').val() == '')  
    {  
      alert("Sila masukkan Tujuan");  
    }  
    else if($('#temp_combdate').val() == '')  
    {  
      alert("Sila masukkan tarikh");  
    }  
    else if($('#temp_edate').val() == '')  
    {  
      alert("Sila masukkan tarikh tamat");  
    }
    else  
    {  
      $.ajax({  
        url:"utiliti/tempahan_controller.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),
        beforeSend:function(data){  
          $('#insert').html("Tambah");
          if(data.tempahan_id==''){
            mesej = 'Rekod berjaya ditambah';
          }
          else{
            mesej = 'Rekod berjaya dikemaskini';
          } 
        },  
        success:function(data){  
          $('#insert_form')[0].reset();  
          $('#add_tempahan').modal('hide');  
          $('#tempahan_table').html(data); 
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
      url:"utiliti/tempahan_controller.php",  
      method:"POST",  
      data:$('#delete_form').serialize(),   
      success:function(data){  
        $('#delete_form')[0].reset();  
        $('#padam_tempahan').modal('hide');  
        $('#tempahan_table').html(data);
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); 
        toastr.error('Rekod berjaya dipadam');
      }  
    });   
  });   
});  

$(function () {

  //Date range picker with time picker
  $('#temp_comdate').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
      format: 'MM/DD/YYYY hh:mmA'
    }
  })
});
</script>


<?php include('bottom_footer.php'); ?>