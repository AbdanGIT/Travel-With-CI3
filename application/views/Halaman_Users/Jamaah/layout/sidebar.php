<!--============================= HEADER =============================-->
<div class="header-topbar">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-sm-8 col-md-9">
        <div class="header-top_address">
          <div class="header-top_list">
            <span class="icon-phone"></span><a href="tel:+tel:++62 898-1126-962">
              081351192539
            </a>
          </div>
          <div class="header-top_list">
            <span class="icon-envelope-open"></span>
            <a href="#"> hannasbjm@gmail.com </a>
          </div>
          <div class="header-top_list">
            <span class="icon-location-pin"></span>
            <a href="https://www.google.com/maps/place/Hannas+Fantastic+Tour+Banjarmasin/@-3.3349832,114.6063348,17z/data=!3m1!4b1!4m5!3m4!1s0x2de421ddea659c5d:0x9e931a08a5973bbf!8m2!3d-3.3349886!4d114.6085235?hl=id&coh=164777&entry=tt">
              Jl. Lkr. Dalam
              Selatan Ruko Abu Coklat No.84
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div data-toggle="affix">
  <div class="container nav-menu2">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
          <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
            <span class="icon-menu"></span>
          </button>
          <a href="<?php echo site_url(''); ?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="200px;" src="<?php echo base_url() . 'theme/images/logoo.png' ?>"></a>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('halaman_users/jamaah/dashboard'); ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('halaman_users/jamaah/tentang'); ?>">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('halaman_users/jamaah/produk'); ?>">Paket</a>
              </li>
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  <?php
                  $id_admin = $this->session->userdata('idadmin');
                  $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
                  $c = $q->row_array();
                  ?>
                  <li class="dropdown user user-menu">
                    <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="<?php echo base_url() . 'assets/images/' . $c['pengguna_photo']; ?>" class="user-image" alt="">
                      <span class="hidden-xs"><?php echo $c['pengguna_nama']; ?></span>
                    </a>
                    <ul class="dropdown-menu" style="background-color: gold;">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="<?php echo base_url() . 'assets/images/' . $c['pengguna_photo']; ?>" class="img-circle" alt="">
                        <p>
                          <?php echo $c['pengguna_nama']; ?>
                          <?php if ($c['pengguna_level'] == '4') : ?>
                            <small>jamaah</small>
                          <?php else : ?>
                            <small>Author</small>
                          <?php endif; ?>
                        </p>
                      </li>
                      <div class="user-footer" style="color: black;">
                        <li class="nav-item">
                          <a href="#" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">Pemesanan</a>
                        </li>

                      </div>
                      <!-- Menu Body -->

                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-right">
                          <a href="<?php echo base_url() . 'logout' ?>"><button>Sign Out</button></a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
                <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
          </ul>
      </div>
      </nav>
    </div>
  </div>
</div>
</div>
<section>