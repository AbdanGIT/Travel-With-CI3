<!--Counter Inbox-->
<?php
$query = $this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
$query2 = $this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Menu Utama</li>
      <li class="<?php if ($page_title == "Admin | Dashboard") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/dashboard' ?>">
          <i class="fa fa-home"></i> <span>Home</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Admin | Profile") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/profile' ?>">
          <i class="fa fa-user"></i> <span>Profil</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Admin | Daftar") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/Daftar' ?>">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Admin | Porsi") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/porsi' ?>">
          <i class="fa fa-shopping-cart"></i> <span>Porsi</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Admin | Paket") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/paket' ?>">
          <i class="fa fa-users"></i> <span>Paket</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($page_title == "Admin | Jamaah") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/jamaah' ?>">
          <i class="fa fa-users"></i> <span>Jamaah</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($page_title == "Admin | Pemesanan") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/pemesanan' ?>">
          <i class="fa fa-shopping-cart"></i> <span>Pemesanan</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($page_title == "Admin | Pembayaran") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/pembayaran' ?>">
          <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Admin | Download_laporan") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/download_laporan' ?>">
          <i class="fa fa-users"></i> <span>Download Laporan</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Admin | Daftar Jamaah") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/admin/paspor' ?>">
          <i class="fa fa-ticket"></i> <span>Rekomendasi Paspor</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Admin | logout") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'logout' ?>">
          <i class="fa fa-sign-out"></i> <span>Sign Out</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>