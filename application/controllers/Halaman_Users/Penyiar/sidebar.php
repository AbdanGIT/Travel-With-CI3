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
      <li class="<?php if ($page_title == "Penyiar | Dashboard") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/penyiar/dashboard' ?>">
          <i class="fa fa-home"></i> <span>Home</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Penyiar | pengguna") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/penyiar/pengguna' ?>">
          <i class="fa fa-user"></i> <span>Profil</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Penyiar | Porsi") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/penyiar/Porsi' ?>">
          <i class="fa fa-plus"></i> <span>Porsi</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Penyiar | Paket") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/Penyiar/paket' ?>">
          <i class="fa fa-calendar"></i> <span>Paket</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Penyiar | Jamaah") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/penyiar/jamaah' ?>">
          <i class="fa fa-users"></i> <span>Jamaah</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Penyiar | Pemesanan") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/penyiar/pemesanan' ?>">
          <i class="fa fa-shopping-cart"></i> <span>Pemesanan</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      </li>
      <li class="<?php if ($page_title == "Penyiar | Pembayaran") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/penyiar/pembayaran' ?>">
          <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "penyiar | download_laporan") echo "active";
                  else echo ""; ?>">
        <a href="<?php echo base_url() . 'halaman_users/penyiar/download_laporan' ?>">
          <i class="fa fa-download"></i> <span>Download Laporan</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($page_title == "Penyiar | logout") echo "active";
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