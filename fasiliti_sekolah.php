
<?php 
include 'utiliti/data.php';
include('header.php');
$sekolah_id = $_SESSION['UKIDSekolah'];

if(isset($_GET['uk'])){
    $sekolah_id = $_GET['uk'];
}




$list = new data();
$list->select("tbl_sekolah_fasiliti","*"," fas_sek_id='$sekolah_id' ");
$fasiliti = $list->sql;

$stat = new data();
$stat->select("tbl_sekolah_fasiliti",
"SUM(if(tbl_sekolah_fasiliti.fas_jenis='Bilik Komputer',1,0)) AS bilKomp,
SUM(if(tbl_sekolah_fasiliti.fas_jenis='Makmal Komputer',1,0)) AS makKomp,
SUM(if(tbl_sekolah_fasiliti.fas_jenis='Pusat Akses',1,0)) AS pusAkses",
" fas_sek_id='$sekolah_id' ");
$statistik = $stat->sql;
$curstat = mysqli_fetch_assoc($statistik);

//get sekolah info
$list2 = new data();
$list2->select("tbl_sekolah
INNER JOIN tbl_daerah ON tbl_sekolah.sek_daerah_id = tbl_daerah.daerah_id
INNER JOIN tbl_ppd ON tbl_sekolah.sek_ppd_id = tbl_ppd.ppd_id",
"tbl_sekolah.sek_nama,
tbl_sekolah.sek_emel,
tbl_sekolah.sek_alamat1,
tbl_sekolah.sek_alamat2,
tbl_sekolah.sek_alamat3,
tbl_sekolah.sek_poskod,
tbl_daerah.daerah_nama,
tbl_ppd.ppd_nama,
tbl_sekolah.sek_phone",
" tbl_sekolah.sekolah_id='$sekolah_id' ");
$sekolah = $list2->sql;
$rowsek = mysqli_fetch_assoc($sekolah);

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
                <h1>Fasiliti Sekolah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Utama</a></li>
                <li class="breadcrumb-item active">Fasiliti</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Fasiliti Sekolah</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Bilik Komputer</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php echo $curstat ['bilKomp']; ?></span>
                            </div>
                        </div>
                        </div>
                        <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Maklmal Komputer</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php echo $curstat ['makKomp']; ?></span>
                            </div>
                        </div>
                        </div>
                        <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Pusat Akses</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php echo $curstat ['pusAkses']; ?></span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <h4>Senarai Fasiliti</h4>
                            <div class="post">
                                <div class="text-right mb-3">  
                                    <button type="button" name="add" id="add" class="btn btn-xs btn-success">Tambah</button>  
                                </div> 
                                <div id="fasiliti_table">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th  class="text-center" width="5%">No.</th>
                                            <th width="40%">Keterangan</th>
                                            <th width="30%">Jenis</th>
                                            <th class="text-center" width="10%">Bilangan PC</th>
                                            <th class="text-center" width="15%">#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if($fasiliti->num_rows > 0){
                                            $bil=1;
                                            while($row = mysqli_fetch_assoc($fasiliti)){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $bil++; ?></td>
                                            <td ><?php echo $row['fas_nama']; ?></td>
                                            <td ><?php echo $row['fas_jenis']; ?></td>
                                            <td class="text-center"><?php echo $row['fas_kuantiti']; ?></td>
                                            <td class="text-center">
                                                <a href="#" id="<?php echo $row['fasiliti_id']; ?>" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" id="<?php echo $row['fasiliti_id'].'&'.$row['fas_sek_id']; ?>" class="btn btn-xs btn-danger del_data" title="Padam">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        }
                                        else{
                                            echo '<td colspan="5" class="text-center"><i>Tiada Rekod</i></td>';
                                        }
                                        ?>                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><?php echo $rowsek['sek_nama']; ?></h3>
                    <h6>(<i><?php echo $rowsek['sek_emel']; ?></i>)</h6>
                    <p class="text-muted">
                        <?php 
                        echo $rowsek['sek_alamat1'].'<br>';
                        if($rowsek['sek_alamat2']!=''){
                            echo $rowsek['sek_alamat2'].'<br>';   
                        }                        
                        if($rowsek['sek_alamat3']!=''){
                            echo $rowsek['sek_alamat3'].'<br>';   
                        }
                        echo  $rowsek['sek_poskod'].' '.$rowsek['daerah_nama'].'<br><br>';
                        echo  'Tel :'.$rowsek['sek_phone'].'<br><br>';
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="add_fasiliti">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" action="" method="post" id="insert_form">
          <input type="hidden" name="fasiliti_id" id="fasiliti_id">
          <input type="hidden" name="fas_sek_id" id="fas_sek_id" value="<?php echo $sekolah_id; ?>">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Fasiliti</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="form-group">
                <label for="fas_nama" class="form-label">Nama Bilik</label>
                <input type="text" class="form-control" id="fas_nama" name="fas_nama">
            </div>
            <div class="form-group">
                <label for="jenis_fasiliti" class="form-label">Jenis Fasiliti</label>
                <select class="form-control select2" id="jenis_fasiliti" name="jenis_fasiliti">
                  <option selected="selected" value="">--Sila  pilih--</option>
                  <option value="Bilik Komputer">Bilik Komputer</option>
                  <option value="Makmal Komputer">Makmal Komputer</option>
                  <option value="Pusat Akses">Pusat Akses</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bilangan" class="form-label">Bilangan</label>
                <input type="number" class="form-control" id="bilangan" name="bilangan">
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
<div class="modal fade" id="padam_fasiliti">
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
            <input type="hidden" name="del_fas_sek_id" id="del_fas_sek_id">
            <input type="hidden" name="del_fasiliti_id" id="del_fasiliti_id">
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
<?php 
include('upper_footer.php');
?>

<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
$(document).ready(function(){ 
  $('#add').click(function(){  
    $('#insert').html("Tambah");  
    $('#insert_form')[0].reset(); 
    $('#add_fasiliti').modal('show');  
  });
  
  // DELETE RECORD
  $(document).on('click', '.del_data', function(){ 
    var iddata = $(this).attr("id");
    var spltid = iddata.split('&');
    var fasiliti_id = spltid[0];
    var fas_sek_id = spltid[1];
    $('#delete_form')[0].reset();    
    $('#del_fasiliti_id').val(fasiliti_id);
    $('#del_fas_sek_id').val(fas_sek_id);
    $('#padam_fasiliti').modal('show');  
  }); 
  
  $(document).on('click', '.edit_data', function(){  
    var fasiliti_id = $(this).attr("id");  
    // alert(fasiliti_id);
    $.ajax({  
      url:"utiliti/data_fasiliti.php",  
      method:"POST",  
      data:{fasiliti_id:fasiliti_id},  
      dataType: "json",  
      success:function(data){ 
        $('#fasiliti_id').val(data.fasiliti_id);
        $('#fas_sek_id').val(data.fas_sek_id);
        $('#fas_nama').val(data.fas_nama);  
        $('#jenis_fasiliti').val(data.fas_jenis);  
        $('#bilangan').val(data.fas_kuantiti);   
        $('#insert').html("Kemaskini");  
        $('#add_fasiliti').modal('show');  
      }  
    });  
  });  
  $('#insert_form').on("submit", function(event){  
    event.preventDefault(); 
    if($('#fas_nama').val() == "")  
    {  
      alert("Sila masukkan Nama Fasiliti");  
    }  
    if($('#jenis_fasiliti').val() == "")  
    {  
      alert("Sila masukkan Jenis Fasiliti");  
    }  
    else if($('#bilangan').val() == '')  
    {  
      alert("Sila masukkan bilangan");  
    }  
    
    else  
    {  
      $.ajax({  
        url:"utiliti/fasiliti_controller.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),
        beforeSend:function(data){  
          $('#insert').html("Tambah");
          if(data.fasiliti_id==''){
            mesej = 'Rekod berjaya ditambah';
          }
          else{
            mesej = 'Rekod berjaya dikemaskini';
          } 
        },  
        success:function(data){  
          $('#insert_form')[0].reset();  
          $('#add_fasiliti').modal('hide');  
          $('#fasiliti_table').html(data);
          location.reload();
          toastr.success(mesej);
        }  
      });  
    }  
  }); 
  $('#delete_form').on("submit", function(event){  
    event.preventDefault();   
    $.ajax({  
      url:"utiliti/fasiliti_controller.php",  
      method:"POST",  
      data:$('#delete_form').serialize(),   
      success:function(data){  
        $('#delete_form')[0].reset();  
        $('#padam_fasiliti').modal('hide');  
        $('#fasiliti_table').html(data);
        location.reload();
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
<?php
include('bottom_footer.php');
?>