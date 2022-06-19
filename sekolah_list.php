<?php 
include('header.php'); 
include 'utiliti/data.php';

$list = new data();
$list->select("
tbl_sekolah
INNER JOIN tbl_ppd ON tbl_sekolah.sek_ppd_id = tbl_ppd.ppd_id",
"tbl_sekolah.sekolah_id,
tbl_sekolah.sek_kod,
tbl_sekolah.sek_nama,
tbl_ppd.ppd_nama,
tbl_sekolah.sek_jenis");
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
            <h1>Senarai Sekolah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sekolah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="table-responsive">  
        <div class="text-right">  
            <button type="button" name="add" id="add" class="btn btn-success">Tambah</button>  
        </div>  
        <br />
        <div id="sekolah_table">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Kod</th>
              <th>Sekolah</th>
              <th>Jenis</th>
              <th>PPD</th>
              <th>#</th>
          </tr>
          </thead>
          <tbody>
      <?php
        while($row = mysqli_fetch_assoc($sekolah)){
      ?>
        <tr>
            <td><?php echo $row['sek_kod']; ?></td>
            <td><?php echo $row['sek_nama']; ?></td>
            <td><?php echo $row['sek_jenis']; ?></td>
            <td><?php echo $row['ppd_nama']; ?></td>
            <td>
              <a href="fasiliti_sekolah.php?uk=<?php echo $row['sekolah_id']; ?>" class="btn btn-xs btn-success" title="Fasiliti">
                  <i class="fas fa-cogs"></i>
              </a>
              <a href="#" id="<?php echo $row['sekolah_id']; ?>" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                  <i class="fas fa-edit"></i>
              </a>
              <a href="#" id="<?php echo $row['sekolah_id']; ?>" class="btn btn-xs btn-danger del_data" title="Padam">
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
          <h4 class="modal-title">Maklumat Sekolah</h4>  
        </div>  
        <div class="modal-body" id="school_details">  
        </div>  
        <div class="modal-footer">  
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>  
        </div>  
      </div>  
    </div>  
  </div> 

  <div class="modal fade" id="add_sekolah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" action="" method="post" id="insert_form">
          <input type="hidden" name="sekolah_id" id="sekolah_id">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Maklumat Sekolah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="kod_sekolah" class="col-sm-2 col-form-label">Kod</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kod_sekolah" name="kod_sekolah" placeholder="Kod Sekolah">
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_sekolah" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah">
              </div>
            </div>
            <div class="form-group row">
              <label for="no_telefon" class="col-sm-2 col-form-label">Jenis Sekolah</label>
              <div class="col-sm-4">
                <select class="form-control select2" id="jenis" name="jenis" style="width: 100%;">
                  <option selected="selected" value="">--Sila  pilih--</option>
                  <?php
                  while($row = mysqli_fetch_assoc($jenis)){
                    echo '<option value="'.$row['jenis'].'">'.$row['jenis'].'</option>';
                  }
                  ?>
                </select>
              </div>
              <label for="alamat_baris1" class="col-sm-2 col-form-label">PTJ</label>
              <div class="col-sm-4">
                <select class="form-control select2" id="ptj" name="ptj" style="width: 100%;">
                  <option selected="selected" value="">--Sila  pilih--</option>
                  <option value="YA">Ya</option>
                  <option value="TIDAK">Tidak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat_baris1" class="col-sm-2 col-form-label">Lokasi</label>
              <div class="col-sm-10">
                <select class="form-control select2" id="lokasi" name="lokasi" style="width: 100%;">
                  <option selected="selected" value="">--Sila  pilih--</option>
                  <option value="Bandar">Bandar</option>
                  <option value="Luar Bandar">Luar Bandar</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat_baris1" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat_baris1" name="alamat_baris1" placeholder="Baris 1">
              </div>
              <label for="alamat_baris2" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10 mt-1">
                <input type="text" class="form-control" id="alamat_baris2" name="alamat_baris2" placeholder="Baris 2">
              </div>
              <label for="alamat_baris3" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10 mt-1">
                <input type="text" class="form-control" id="alamat_baris3" name="alamat_baris3" placeholder="Baris 3">
              </div>
              <label for="poskod" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-5 mt-1">
                <input type="text" class="form-control" id="poskod" name="poskod" placeholder="Poskod">
              </div>                
              <div class="col-sm-5 mt-1">
                <select class="form-control select2" id="daerah" name="daerah" style="width: 100%;">
                  <option selected="selected">--Sila  pilih Bandar--</option>
                  <option value="100000">Kuala Lumpur</option>>
                </select>
              </div>
              <label for="inputName2" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-5 mt-1">
                <select class="form-control select2" id="negeri" name="negeri" style="width: 100%;">
                  <option selected="selected">--Sila  pilih negeri--</option>
                  <option value="14">W.P. Kuala Lumpur</option>
                </select>
              </div>                
            </div>
            <div class="form-group row">
              <label for="no_telefon" class="col-sm-2 col-form-label">PPD</label>
              <div class="col-sm-10">
                <select class="form-control select2" id="ppd" name="ppd" style="width: 100%;">
                  <option selected="selected" value="">--Sila  pilih PPD--</option>
                  <option value="1000">PPD Bangsar Pudu</option>
                  <option value="1001">PPD Keramat</option>
                  <option value="1002">PPD Sentul</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_telefon" class="col-sm-2 col-form-label">No Telefon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="no_telefon" name="no_telefon" placeholder="No Telefon Sekolah">
              </div>
            </div>
            <div class="form-group row">
              <label for="emel" class="col-sm-2 col-form-label">E-Mel</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="emel" name="emel" placeholder="E-Mel Sekolah">
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

  <div class="modal fade" id="padam_sekolah">
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
            <input type="hidden" name="del_sekolah_id" id="del_sekolah_id">
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