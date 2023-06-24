<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pemesanan
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Pemesanan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span
                  class="fa fa-plus"></span> Tambah Pemesanan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pemesanan</th>
                    <th>Nama Paket</th>
                    <th>Kota Keberangkatan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Kembali</th>
                    <th>Jenis Pemesanan</th>
                    <th>Total Harga</th>
                    <th>Keterangan</th>

                    <th style="text-align:right;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data->result_array() as $i):
                    $no++;
                    $id = $i['id_pemesanan'];
                    $nama_paspor = $i['nama_paspor'];
                    $nama_paket = $i['nama_paket'];
                    $kota_keberangkatan = $i['kota_keberangkatan'];
                    $tgl_keberangkatan = $i['tgl_keberangkatan'];
                    $tgl_kembali = $i['tgl_kembali'];
                    $jenis_pemesanan = $i['jenis_pemesanan'];
                    $harga = $i['harga'];
                    $keterangan = $i['keterangan'];

                    ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php echo $nama_paspor; ?>
                      </td>
                      <td>
                        <?php echo $nama_paket; ?>
                      </td>
                      <td>
                        <?php echo $kota_keberangkatan; ?>
                      </td>
                      <td>
                        <?php echo $tgl_keberangkatan; ?>
                      </td>
                      <td>
                        <?php echo $tgl_kembali; ?>
                      </td>
                      <td>
                        <?php echo $jenis_pemesanan; ?>
                      </td>
                      <td>
                        <?php echo number_format($harga, 0, ',', '.'); ?>
                      </td>
                      <td>
                        <?php echo $keterangan; ?>
                      </td>

                      <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span
                            class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span
                            class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Add Pengguna -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span
              class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pemesanan</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/pemesanan/simpan_pemesanan' ?>"
        method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Nama Pemesanan</label>
            <div class="col-sm-7">
              <select name="xnama_paspor" class="form-control" required>
                <option value="">-Pilih-</option>
                <?php
                foreach ($pemesan->result_array() as $i) {
                  $id_jamaah = $i['id_jamaah'];
                  $nama_paspor = $i['nama_paspor'];

                  ?>
                  <option value=" <?php echo $id_jamaah ?>"><?php echo $nama_paspor ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Nama Paket</label>
            <div class="col-sm-7">
              <select name="xnama_paket" class="form-control" id="id_paket" onchange="uptextTotalHarga(this)" required>
                <option value="">-Pilih-</option>
                <?php
                foreach ($paket->result_array() as $k) {
                  $id_paket = $k['id_paket'];
                  $nama_paket = $k['nama_paket'];

                  ?>
                  <option value="<?php echo $id_paket; ?>"><?php echo $nama_paket; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Kota Keberangkatan</label>
            <div class="col-sm-7">
              <input type="text" name="xkota_keberangkatan" class="form-control" id="kotakeberangkatan"
                placeholder="Kota Keberangkatan" required readonly>
            </div>
          </div>



          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Tanggal Berangkat</label>
            <div class="col-sm-7">
              <input type="text" name="xtgl_keberangkatan" class="form-control" id="berangkat"
                placeholder="Tanggal Berangkat" required readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Tanggal Kembali</label>
            <div class="col-sm-7">
              <input type="text" name="xtgl_kembali" class="form-control" id="kembali" placeholder="Tanggal Kembali"
                required readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
            <div class="col-sm-7">
              <input type="text" name="xketerangan" class="form-control" id="keterangan" placeholder="Kategori" required
                readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Jenis Pemesanan</label>
            <div class="col-sm-7">
              <select name="xjenis_pemesanan" class="form-control" required>
                <option value="">-Pilih-</option>
                <option value="Cicilan ke-3">Cicilan ke-3</option>
                <option value="Cicilan ke-6">Cicilan ke-6</option>
                <option value="Cicilan ke-9">Cicilan ke-9</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Total Harga</label>
            <div class="col-sm-7">
              <input type="text" name="xharga" class="form-control" id="harga" placeholder="Total Harga" required
                readonly>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!--Modal Edit Album-->
<?php foreach ($data->result_array() as $i):
  $id = $i['id_pemesanan'];
  ?>

  <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span
                class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit pemesanan</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/pemesanan/update_pemesanan' ?>"
          method="post" enctype="multipart/form-data">
          <?php
          $data1 = $this->db->query("SELECT tbl_pemesanan.id_pemesanan , tbl_pemesanan.id_jamaah_p,tbl_jamaah.nama_paspor ,tbl_pemesanan.id_paket_p ,tbl_paket.nama_paket From tbl_pemesanan 
          Left join tbl_jamaah on tbl_pemesanan.id_jamaah_p=tbl_jamaah.id_jamaah
          Left join tbl_paket on tbl_pemesanan.id_paket_p=tbl_paket.id_paket 
          where id_pemesanan = '$id'");
          foreach ($data1->result_array() as $p): {
              $id_jamaah = $p['id_jamaah_p'];
              $nama_paspor_ = $p['nama_paspor'];
              $id_paket_ = $p['id_paket_p'];
              $nama_paket_ = $p['nama_paket'];
              ?>
              <input type="hidden" name="kode" value="<?php echo $id; ?>" />

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Nama Pemesanan</label>
                <div class="col-sm-7">
                  <select name="xnama_paspor" class="form-control" required>
                    <option value="<?php echo $id_jamaah; ?>"><?php echo $nama_paspor_; ?></option>
                    <?php
                    foreach ($pemesan->result_array() as $j) {
                      $id_jamaah = $j['id_jamaah'];
                      $nama_paspor_jamaah = $j['nama_paspor'];

                      $selected = ($id_jamaah == $nama_paspor) ? 'selected' : '';
                      ?>
                      <option value="<?php echo $id_jamaah; ?>" <?php echo $selected; ?>><?php echo $nama_paspor_jamaah; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Nama Paket</label>
                <div class="col-sm-7">
                  <select name="xnama_paket" class="form-control" id="id_paket" onchange="uptextTotal(this)" required>
                    <option value="<?php echo $id_paket_; ?>"><?php echo $nama_paket_; ?></option>

                    <?php
                    foreach ($paket->result_array() as $k) {
                      $id_paket = $k['id_paket'];
                      $nama_paket_pilihan = $k['nama_paket'];

                      echo '<option value="' . $id_paket . '">' . $nama_paket_pilihan . '</option>';
                    }
                    ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Jenis Pemesanan</label>
                <div class="col-sm-7">
                  <select name="xjenis_pemesanan" class="form-control" required>
                    <option value="">-Pilih-</option>
                    <option value="Cicilan ke-3" <?php if ($jenis_pemesanan == 'Cicilan ke-3')
                      echo 'selected'; ?>>Cicilan ke-3
                    </option>
                    <option value="Cicilan ke-6" <?php if ($jenis_pemesanan == 'Cicilan ke-6')
                      echo 'selected'; ?>>Cicilan ke-6
                    </option>
                    <option value="Cicilan ke-9" <?php if ($jenis_pemesanan == 'Cicilan ke-9')
                      echo 'selected'; ?>>Cicilan ke-9
                    </option>
                  </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>


    <?php }
          endforeach; ?>
<?php endforeach; ?>
<!--Modal Edit Album-->

<?php foreach ($data->result_array() as $i):
  $id = $i['id_pemesanan'];
  $nama_paspor = $i['nama_paspor'];
  $nama_paket = $i['nama_paket'];
  $kota_keberangkatan = $i['kota_keberangkatan'];
  $tgl_keberangkatan = $i['tgl_keberangkatan'];
  $tgl_kembali = $i['tgl_kembali'];
  $jenis_pemesanan = $i['jenis_pemesanan'];
  $harga = $i['harga'];
  $keterangan = $i['keterangan'];
  ?>

  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span
                class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus pemesanan</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/pemesanan/hapus_pemesanan' ?>"
          method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="kode" value="<?php echo $id; ?>" />
            <p>Apakah Anda yakin mau menghapus pemesanan <b>
                <?php echo $nama_paspor; ?>
              </b> ?</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<script>
  function uptextTotalHarga(select) {
    var harga = 0;
    var kota = "";
    var berangkat = "";
    var kembali = "";
    var keterangan = "";
    var namaPaket = select.value;
    var hasil = <?php echo json_encode($paket->result_array()); ?>; // Assuming $paket is a PHP array containing data

    for (var i = 0; i < hasil.length; i++) {
      if (namaPaket === hasil[i]['id_paket']) {
        harga = hasil[i]['harga'];
        kota = hasil[i]['kota_keberangkatan'];
        berangkat = hasil[i]['tgl_keberangkatan'];
        kembali = hasil[i]['tgl_kembali'];
        keterangan = hasil[i]['keterangan'];
        break; // Exit the loop once a match is found
      }
    }

    document.getElementById('kotakeberangkatan').value = kota;
    document.getElementById('berangkat').value = berangkat;
    document.getElementById('kembali').value = kembali;
    document.getElementById('keterangan').value = keterangan;
    document.getElementById('harga').value = harga.toLocaleString('id-ID');
  }
</script>