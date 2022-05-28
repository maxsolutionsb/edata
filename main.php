
<?php include('header.php'); ?>

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
              <h3>150</h3>

              <p>Jumlah Sekolah</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53</h3>

              <p>Bilik Komputer</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>
              <p>Makmal Komputer</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>
              <p>Pusat Akses</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
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
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/unknown_user.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">MOHD FADZILLAH</h3>

                <p class="text-muted text-center">Juruteknik Komputer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    SEKOLAH KEBANGSAAN AU KERAMAT 
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
                  <li class="nav-item"><a class="nav-link active" href="#sekolah" data-toggle="tab">Senarai Sekolah</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Kemaskini Profil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="sekolah">
                    <!-- <div class="row">  -->
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Kod</th>
                          <th>Sekolah</th>
                          <th>PPD</th>
                          <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>WBA0053</td>
                          <td>SEKOLAH KEBANGSAAN AU KERAMAT</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA00544</td>
                          <td>SEKOLAH KEBANGSAAN WANGSA MELAWATI</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA0055</td>
                          <td>SEKOLAH KEBANGSAAN WANGSA MAJU SEKSYEN 1</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA0056</td>
                          <td>SEKOLAH KEBANGSAAN WANGSA MAJU SEKSYEN 2</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA0057</td>
                          <td>SEKOLAH KEBANGSAAN WANGSA MAJU ZON R10</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA0058</td>
                          <td>SEKOLAH JENIS KEBANGSAAN (CINA) MUN YEE</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA0059</td>
                          <td>SEKOLAH JENIS KEBANGSAAN (CINA) NAN KAI</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA0060</td>
                          <td>SEKOLAH JENIS KEBANGSAAN (CINA) WANGSA MAJU</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>WBA0061</td>
                          <td>SEKOLAH JENIS KEBANGSAAN (TAMIL) FLETCHER</td>
                          <td>PPD KERAMAT</td>
                          <td>
                            <a href="#" class="btn" data-toggle="modal" data-target="#modal-default">
                              <i class="nav-icon fas fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    <!-- </div> -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="inputName" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">No. Telefon</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="inputName" placeholder="No. Telefon">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">E-Mel</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="inputEmail" placeholder="E-Mel">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-3 col-form-label">Sekolah</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="inputName2" placeholder="Sekolah">
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-danger">Kemaskini</button>
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

  <!-- MODAL -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal">
          <div class="modal-header">
            <h4 class="modal-title">Kemakini Maklumat Sekolah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">Kod</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputName" placeholder="Kod Sekolah">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail" placeholder="Nama Sekolah">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName2" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputName2" placeholder="Baris 1">
                </div>
                <label for="inputName2" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9 mt-1">
                  <input type="text" class="form-control" id="inputName2" placeholder="Baris 2">
                </div>
                <label for="inputName2" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9 mt-1">
                  <input type="text" class="form-control" id="inputName2" placeholder="Baris 3">
                </div>
                <label for="inputName2" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-4 mt-1">
                  <input type="text" class="form-control" id="inputName2" placeholder="Poskod">
                </div>
                <div class="col-sm-5 mt-1">
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">--Sila  pilih negeri--</option>
                    <option>W.P. Kuala Lumpur</option>
                    <option>W.P. Putraaya</option>
                    <option>W.P. Labuan</option>
                  </select>
                </div>
                <label for="inputName2" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-4 mt-1">
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">--Sila  pilih daerah--</option>
                    <option>Sentul</option>
                    <option>Selayang</option>
                    <option>Kepung</option>
                    <option>Bandar Utama</option>
                    <option>Segambut</option>
                    <option>Jinjang</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputSkills" class="col-sm-3 col-form-label">No Telefon</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputSkills" placeholder="No Telefon Sekolah">
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>        
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <?php 
  include('upper_footer.php');
  include('bottom_footer.php');
  ?>