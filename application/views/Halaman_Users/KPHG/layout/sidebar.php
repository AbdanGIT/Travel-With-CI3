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
      <li class="<?php if ($page_title == "KPHG | Dashboard") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/KPHG/dashboard' ?>">
          <i class="fa fa-home"></i> <span>Home</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      </li>

      <li class="<?php if ($page_title == "KPHG | Pengguna") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/KPHG/pengguna' ?>">
          <i class="fa fa-users"></i> <span>Profil</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($page_title == "KPHG | Paket") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/KPHG/paket' ?>">
          <i class="fa fa-users"></i> <span>Paket</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($page_title == "KPHG | Jamaah") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/KPHG/jamaah' ?>">
          <i class="fa fa-users"></i> <span>Jamaah</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($page_title == "KPHG | Pemesanan") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/KPHG/Pemesanan' ?>">
          <i class="fa fa-shopping-cart"></i> <span>Pemesanan</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($page_title == "KPHG | Detail_pembayaran") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/KPHG/detail_pembayaran' ?>">
          <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "KPHG | Download_laporan") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/KPHG/download_laporan' ?>">
          <i class="fa fa-users"></i> <span>Download Laporan</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "KPHG | Logout") echo "active";
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