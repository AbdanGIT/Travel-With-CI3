  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <div class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Admin</h3>

              <table class="table">
                <?php $id_admin = $this->session->userdata('idadmin');
                $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
                $c = $q->row_array(); ?>
                <tr>
                  <td>Assalamualaikum Admin Banjarmasin. dihalaman Administrator </td>
                </tr>
                <tr>
                  <tbody>
                    <tr>
                      <td>
                        Admin <?php echo $c['pengguna_nama']; ?>
                      </td>
                    <tr>
                    <tr>
                      <td>
                        link Replika Marketing Jamaah
                      </td>
                    </tr>
                    <td>
                      https://hannas.com/adminbanjarmasin
                    </td>
                </tr>
                <tr>
                  <td>
                    https://hannas.com/adminbanjarmasin
                  </td>
                </tr>
                </tr>
                </tbody>
                </tr>
              </table>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
          <!-- /.col -->
          <!-- /.info-box -->

        </div>

        <!-- PRODUCT LIST -->

        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-filter"></i></span>
            <?php
            $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Chrome'");
            $jml = $query->num_rows();
            ?>
            <div class="info-box-content">
              <span class="info-box-text">Porsi Admin</span>
              <span class="info-box-number"> 12/12</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-filter"></i></span>
            <?php
            $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Chrome'");
            $jml = $query->num_rows();
            ?>
            <div class="info-box-content">
              <span class="info-box-text">Jamaah Banjarmasin</span>
              <span class="info-box-number"> 0/5000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-filter"></i></span>
            <?php
            $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Chrome'");
            $jml = $query->num_rows();
            ?>
            <div class="info-box-content">
              <span class="info-box-text">Penyiar Banjarmasin</span>
              <span class="info-box-number"> 0/100</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->