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
                              <h1 class="m-0"></h1>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="container-fluid">
                  <div class="row">
                      <Form action="<?php base_url(''); ?> " method="Post">
                          <?php
                            $id_admin = $this->session->userdata('idadmin');
                            $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
                            $b = $this->db->query("SELECT tbl_jamaah.nama_ktp,tbl_jamaah.nama_paspor,tbl_jamaah.no_identitas,tbl_jamaah.no_tlp,tbl_jamaah.nama_ayah,tbl_jamaah.email,tbl_jamaah.tanggal_lahir,tbl_jamaah.jenis_kelamin,tbl_jamaah.kewarganegaraan,tbl_jamaah.tempat_lahir,tbl_jamaah.alamat,tbl_jamaah.pendidikan,tbl_jamaah.provinsi,tbl_jamaah.kota,tbl_jamaah.kecamatan,tbl_jamaah.kelurahan,tbl_jamaah.kategori_usia,tbl_jamaah.status_menikah,tbl_jamaah.pekerjaan,tbl_jamaah.status_keluarga,tbl_jamaah.ukuran_baju,tbl_jamaah.tipe_anggota,tbl_jamaah.porsi,tbl_jamaah.penyiar,tbl_jamaah.perwakilan,tbl_pengguna.pengguna_level,tbl_pengguna.pengguna_photo FROM tbl_jamaah
                            RIGHT JOIN tbl_pengguna on tbl_pengguna.pengguna_id = tbl_jamaah.id_jamaah
                            WHERE pengguna_id='$id_admin'");
                            $c = $b->row_array();
                            ?>
                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="card card-danger">
                                          <div class="card-header">
                                              <h3 class="card-title">Data Profile</h3>
                                          </div>
                                          <div class="container-fluid">
                                              <div class="card-body" style="border: 100px;">
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="card-body box-profile">
                                                              <div class="text-center">
                                                                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() . 'assets/images/' . $c['pengguna_photo']; ?>" alt="User profile picture">
                                                                  <h3 class="profile-username text-center mb-3 mt-3">Profile</h3>
                                                              </div>
                                                              <input type="file" name="filefoto" accept="image/*" required>
                                                              <br>
                                                              <!-- <a href="<?php base_url(''); ?> edit_profile" class="btn btn-primary btn-block"><b>Edit</b></a> -->
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="card-body">
                                                  <label for="NIK">Nomor Identitas</label>
                                                  <!-- <strong>NIK</strong> -->
                                                  <br>
                                                  <!-- <p class="text-muted"><?php echo $c['no_identitas']; ?></p> -->
                                                  <input type="text" class="form-control" id="NIK" placeholder="Masukkan email" value="<?php echo $c['no_identitas']; ?>" disabled>
                                                  <hr>
                                                  <!-- <strong>Nama Lengkap</strong> -->

                                                  <label for="NIK">Nama Paspor</label>
                                                  <!-- <p class="text-muted"><?php echo $c['nama_paspor']; ?></p> -->
                                                  <br>
                                                  <input type="text" class="form-control" id="email" placeholder="Masukkan email" value="<?php echo $c['nama_paspor']; ?>" disabled>
                                                  <hr>
                                                  <!-- <strong>Jenis Kelamin</strong> -->

                                                  <label for="NIK">Jenis Kelamin</label>
                                                  <!-- <p class="text-muted"><?php echo $c['jenis_kelamin']; ?></p> -->
                                                  <br>
                                                  <input type="text" class="form-control" id="email" placeholder="Masukkan email" value="<?php
                                                                                                                                            if ($c['jenis_kelamin'] == 'L') {
                                                                                                                                                echo 'Laki Laki';
                                                                                                                                            } else {
                                                                                                                                                echo 'Perempuan';
                                                                                                                                            }

                                                                                                                                            ?>" disabled>

                                                  <hr>
                                                  <!-- <strong>Tanggal Lahir</strong> -->

                                                  <label for="No_Hp">No Hp</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="email" placeholder="Masukkan email" value="<?php echo $c['no_tlp']; ?>" disabled>
                                                  <hr>
                                                  <label for="nama_ktp">nama_ktp</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xnama_ktp" placeholder="Masukkan email" value="<?php echo $c['nama_ktp']; ?>" disabled>
                                                  <hr>

                                                  <label for="tempat_lahir">tempat_lahir</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xtempat_lahir" placeholder="Masukkan email" value="<?php echo $c['tempat_lahir']; ?>" disabled>
                                                  <hr><label for=" nama_ayah">nama_ayah</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xnama_ayah" placeholder="Masukkan email" value="<?php echo $c['nama_ayah']; ?>" disabled>
                                                  <hr>
                                                  <label for="email">email</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xemail" placeholder="Masukkan email" value="<?php echo $c['email']; ?>" disabled>
                                                  <hr>
                                                  <label for="tanggal_lahir">tanggal_lahir</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xtanggal_lahir" placeholder="Masukkan email" value="<?php echo $c['tanggal_lahir']; ?>" disabled>
                                                  <hr>
                                                  <!-- <label for=""></label>
                                  <br>
                                  <input type="text" class="form-control" id="x" placeholder="Masukkan email" value="<?php echo $c['']; ?>" disabled>
                                  <hr> -->
                                                  <label for="jenis_kelamin">jenis_kelamin</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xjenis_kelamin" placeholder="Masukkan email" value="<?php echo $c['jenis_kelamin']; ?>" disabled>
                                                  <hr>
                                                  <label for="kewarganegaraan">kewarganegaraan</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xkewarganegaraan" placeholder="Masukkan email" value="<?php echo $c['kewarganegaraan']; ?>" disabled>
                                                  <hr>
                                                  <label for="alamat">alamat</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xalamat" placeholder="Masukkan email" value="<?php echo $c['alamat']; ?>" disabled>
                                                  <hr>


                                                  <label for="pendidikan">pendidikan</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xpendidikan" placeholder="Masukkan email" value="<?php echo $c['pendidikan']; ?>" disabled>
                                                  <hr>
                                                  <label for="provinsi">provinsi</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xprovinsi" placeholder="Masukkan email" value="<?php echo $c['provinsi']; ?>" disabled>
                                                  <hr>
                                                  <label for="kota">kota</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xkota" placeholder="Masukkan email" value="<?php echo $c['kota']; ?>" disabled>
                                                  <hr>
                                                  <label for="kecamatan">kecamatan</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xkecamatan" placeholder="Masukkan email" value="<?php echo $c['kecamatan']; ?>" disabled>
                                                  <hr>
                                                  <label for="kelurahan">kelurahan</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xkelurahan" placeholder="Masukkan email" value="<?php echo $c['kelurahan']; ?>" disabled>
                                                  <hr>
                                                  <label for="kategori_usia">kategori_usia</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xkategori_usia" placeholder="Masukkan email" value="<?php echo $c['kategori_usia']; ?>" disabled>
                                                  <hr>

                                                  <label for="status_menikah">status_menikah</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xstatus_menikah" placeholder="Masukkan email" value="<?php echo $c['status_menikah']; ?>" disabled>
                                                  <hr>
                                                  <label for="pekerjaan">pekerjaan</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xpekerjaan" placeholder="Masukkan email" value="<?php echo $c['pekerjaan']; ?>" disabled>
                                                  <hr>
                                                  <label for="status_keluarga">status_keluarga</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xstatus_keluarga" placeholder="Masukkan email" value="<?php echo $c['status_keluarga']; ?>" disabled>
                                                  <hr>
                                                  <label for="ukuran_baju">ukuran_baju</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xukuran_baju" placeholder="Masukkan email" value="<?php echo $c['ukuran_baju']; ?>" disabled>
                                                  <hr>
                                                  <label for="tipe_anggota">tipe_anggota</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xtipe_anggota" placeholder="Masukkan email" value="<?php echo $c['tipe_anggota']; ?>" disabled>
                                                  <hr>
                                                  <label for="penyiar">penyiar</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xpenyiar" placeholder="Masukkan email" value="<?php echo $c['penyiar']; ?>" disabled>
                                                  <hr>
                                                  <label for="perwakilan" class="text-center">perwakilan</label>
                                                  <br>
                                                  <input type="text" class="form-control" id="xperwakilan" placeholder="Masukkan email" value="<?php echo $c['perwakilan']; ?>" disabled>
                                                  <hr>

                                                  <!-- <strong>Usia</strong> -->
                                                  <label for="NIK">Status Anggota</label>
                                                  <p class="text-muted"><?php
                                                                        if ($c['pengguna_level'] == '1') {
                                                                            # code...
                                                                            echo 'Administrator';
                                                                        } elseif ($c['pengguna_level'] == '2') {
                                                                            # code...
                                                                            echo 'KPHG';
                                                                        } elseif ($c['pengguna_level'] == '3') {
                                                                            # code...
                                                                            echo 'Penyiar';
                                                                        } else {
                                                                            echo 'Jamaah';
                                                                        }

                                                                        ?></p>

                                                  <div class="card-footer text-right">
                                                      <!-- Tambahkan tombol "Simpan" di sebelah kanan -->
                                                      <a href="">
                                                          <button type="button" class="btn btn-primary">Simpan</button>
                                                      </a>
                                                      <a href="<?php echo base_url(); ?>halaman_users/admin/profile">
                                                          <button type="button" class="btn btn-secondary">Kembali</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </from>
                  </div>
              </div>
      </section>
  </div>