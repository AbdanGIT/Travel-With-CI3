  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Profile
              <small></small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Profile</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Info boxes -->
          <div class="row">
              <div class="content-header">
                  <div class="container-fluid">
                      <div class="row mb-2">
                          <div class="col-sm-6">
                              <h1 class="m-0">Profile</h1>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="card card-danger card-outline">
                              <div class="card-body box-profile">
                                  <div class="text-center">
                                      <?php
                                        $id_admin = $this->session->userdata('idadmin');
                                        $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
                                        $c = $q->row_array();
                                        ?>
                                      <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() . 'assets/images/' . $c['pengguna_photo']; ?>" alt="User profile picture">
                                  </div>
                                  <h3 class="profile-username text-center mb-3 mt-3">Profile</h3>
                                  <a href="/admin/edit-profile" class="btn btn-primary btn-block"><b>Edit</b></a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-9">
                          <div class="card card-danger">
                              <div class="card-header">
                                  <h3 class="card-title">Data Profile</h3>
                              </div>
                              <div class="card-body">
                                  <strong>NIK</strong>
                                  <p class="text-muted"><?php echo $c['pengguna_id']; ?></p>
                                  <hr>
                                  <strong>Nama Lengkap</strong>
                                  <p class="text-muted"><?php echo $c['pengguna_nama']; ?></p>
                                  <hr>
                                  <strong>Jenis Kelamin</strong>
                                  <p class="text-muted"><?php echo $c['pengguna_jenkel']; ?></p>
                                  <hr>
                                  <strong>Tanggal Lahir</strong>
                                  <p class="text-muted"><?php echo $c['pengguna_nohp']; ?></p>
                                  <hr>
                                  <strong>Usia</strong>
                                  <p class="text-muted"><?php echo $c['pengguna_level']; ?></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.row -->
      </section>
  </div>
  <!-- /.content-wrapper -->