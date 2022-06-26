<?php 
include 'utiliti/data.php';
include 'utiliti/include.php';
include('header.php'); 

$list = new data();
$list->select("
tbl_pengguna
INNER JOIN tbl_pengguna_role ON tbl_pengguna.user_id = tbl_pengguna_role.pr_user_id
LEFT JOIN tbl_sekolah ON tbl_pengguna_role.pr_sekolah_id = tbl_sekolah.sekolah_id",
"tbl_pengguna.user_id,
tbl_pengguna.user_nama,
tbl_pengguna.user_nokp,
tbl_sekolah.sek_nama,
tbl_pengguna_role.pr_role");
$staff = $list->sql;

$lssekolah= new data();
$lssekolah->select("tbl_sekolah");
$sekolah = $lssekolah->sql;
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
            <h1>Senarai Kakitangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kakitangan</li>
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
        <div id="user_table">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th class="text-center">#ID</th>
              <th>Nama</th>
              <th class="text-center">No. KP.</th>
              <th>Sekolah</th>
              <th>Peranan</th>
              <th>#</th>
          </tr>
          </thead>
          <tbody>
      <?php
        while($row = mysqli_fetch_assoc($staff)){
      ?>
        <tr>
            <td class="text-center"><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['user_nama']; ?></td>
            <td class="text-center"><?php echo $row['user_nokp']; ?></td>
            <td><?php echo $row['sek_nama']; ?></td>
            <td><?php echo userRole($row['pr_role']); ?></td>
            <td>
              <a href="#" id="<?php echo $row['user_id']; ?>" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                  <i class="fas fa-edit"></i>
              </a>
              <a href="#" id="<?php echo $row['user_id']; ?>" class="btn btn-xs btn-danger del_data" title="Padam">
                  <i class="fas fa-trash"></i>
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

<!-- MODAL -->
<div id="dataModal" class="modal fade">  
    <div class="modal-dialog">  
      <div class="modal-content">  
        <div class="modal-header">  
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="modal-title">Maklumat Kakitangan</h4>  
        </div>  
        <div class="modal-body" id="staff_details">  
        </div>  
        <div class="modal-footer">  
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>  
        </div>  
      </div>  
    </div>  
</div> 

<div class="modal fade" id="add_user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" action="" method="post" id="insert_form">
                <input type="hidden" name="user_id" id="user_id">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Maklumat Kakitangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="user_nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_nama" name="user_nama" placeholder="Nama Kakitangan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_nokp" class="col-sm-3 col-form-label">No Kad Pengenalan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_nokp" name="user_nokp" placeholder="No Kad Pengenalan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_email" class="col-sm-3 col-form-label">Emel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Emel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pr_ppd_id" class="col-sm-3 col-form-label">PPD</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="pr_ppd_id" name="pr_ppd_id" style="width: 100%;">
                                <option selected="selected" value="">--Sila  pilih--</option>
                                <option value="1000">PPD Bangsar Pudu</option>
                                <option value="1001">PPD Keramat</option>
                                <option value="1002">PPD Sentul</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pr_sekolah_id" class="col-sm-3 col-form-label">Sekolah</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="pr_sekolah_id" name="pr_sekolah_id" style="width: 100%;">
                            <option selected="selected" value="">--Sila  pilih--</option>
                            <?php
                            while($row = mysqli_fetch_assoc($sekolah)){
                                echo '<option value="'.$row['sekolah_id'].'">'.$row['sek_nama'].'</option>';
                            }
                            ?>
                            </select>
                        </div>                
                    </div>
                    <div class="form-group row">
                        <label for="pr_role" class="col-sm-3 col-form-label">Peranan</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="pr_role" name="pr_role" style="width: 100%;">
                                <option selected="selected" value="">--Sila  pilih--</option>
                                <option value="1">Pentadbir</option>
                                <option value="2">PPD</option>
                                <option value="3">Sekolah</option>
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

  <div class="modal fade" id="padam_user">
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
            <input type="hidden" name="del_user_id" id="del_user_id">
            <input type="hidden" name="del_action" value="Padam">
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <button type="submit" id="btn_del_user" class="btn btn-danger">Ya</button>
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
    $('#add_user').modal('show');  
  });
  
  // DELETE RECORD
  $(document).on('click', '.del_data', function(){ 
    var user_id = $(this).attr("id");
    $('#delete_form')[0].reset();    
    $('#del_user_id').val(user_id);
    $('#padam_user').modal('show');  
  }); 
  
  $(document).on('click', '.edit_data', function(){  
    var user_id = $(this).attr("id");  
    // alert(sekolah_id);
    $.ajax({  
      url:"utiliti/data_pengguna.php",  
      method:"POST",  
      data:{user_id:user_id},  
      dataType: "json",  
      success:function(data){ 
        $('#user_id').val(data.user_id); 
        $('#user_nama').val(data.user_nama);  
        $('#user_nokp').val(data.user_nokp);  
        $('#user_email').val(data.user_email);  
        $('#pr_ppd_id').val(data.pr_ppd_id);  
        $('#pr_sekolah_id').val(data.pr_sekolah_id);  
        $('#pr_role').val(data.pr_role); 
        $('#insert').html("Kemaskini");  
        $('#add_user').modal('show');  
      }  
    });  
  });  
  $('#insert_form').on("submit", function(event){  
    event.preventDefault();  
    if($('#user_nama').val() == "")  
    {  
      alert("Sila masukkan Nama Kakitangan");  
    }  
    else if($('#user_nokp').val() == '')  
    {  
      alert("Sila masukkan No Kad Pengenalan");  
    }  
    else if($('#user_email').val() == '')  
    {  
      alert("Sila masukkan emel");  
    }  
    else if($('#pr_ppd_id').val() == '')  
    {  
      alert("Sila pilih PPD");  
    }
    else if($('#pr_sekolah_id').val() == '')  
    {  
      alert("Sila pilih sekolah");  
    }
    else if($('#pr_role').val() == '')  
    {  
      alert("Sila pilih peranan");  
    } 
    else  
    {  
      $.ajax({  
        url:"utiliti/pengguna_controller.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),
        beforeSend:function(data){  
          $('#insert').html("Tambah");
          if(data.user_id==''){
            mesej = 'Rekod berjaya ditambah';
          }
          else{
            mesej = 'Rekod berjaya dikemaskini';
          } 
        },  
        success:function(data){  
          $('#insert_form')[0].reset();  
          $('#add_user').modal('hide');  
          $('#user_table').html(data); 
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
      url:"utiliti/pengguna_controller.php",  
      method:"POST",  
      data:$('#delete_form').serialize(),   
      success:function(data){  
        $('#delete_form')[0].reset();  
        $('#padam_user').modal('hide');  
        $('#user_table').html(data);
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