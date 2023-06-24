<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paket
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Paket</li>
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
                                    class="fa fa-plus"></span> Tambah paket</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-striped" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Tanggal Keberangkatan</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Kota Keberangkatan</th>
                                        <th>Hotel</th>
                                        <th>Maskapai</th>
                                        <th>Harga</th>
                                        <th>Porsi</th>
                                        <th>Keterangan</th>
                                        <th>Photo</th>
                                        <th style="text-align:right;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data->result_array() as $i):
                                        $no++;
                                        $id = $i['id_paket'];
                                        $nama_paket = $i['nama_paket'];
                                        $tgl_keberangkatan = $i['tgl_keberangkatan'];
                                        $tgl_kembali = $i['tgl_kembali'];
                                        $kota_keberangkatan = $i['kota_keberangkatan'];
                                        $hotel = $i['hotel'];
                                        $maskapai = $i['maskapai'];
                                        $harga = $i['harga'];
                                        $porsi = $i['porsi'];
                                        $keterangan = $i['keterangan'];
                                        $photo = $i['photo'];

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $id; ?>
                                            </td>
                                            <td>
                                                <?php echo $nama_paket; ?>
                                            </td>
                                            <td>
                                                <?php echo $tgl_keberangkatan; ?>
                                            </td>
                                            <td>
                                                <?php echo $tgl_kembali; ?>
                                            </td>
                                            <td>
                                                <?php echo $kota_keberangkatan; ?>
                                            </td>
                                            <td>
                                                <?php echo $hotel; ?>
                                            </td>
                                            <td>
                                                <?php echo $maskapai; ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($harga, 0, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <?php echo $porsi; ?>
                                            </td>
                                            <td>
                                                <?php echo $keterangan; ?>
                                            </td>
                                            <?php if (empty($photo)): ?>
                                                <td><img width="40" height="40" class="img-circle"
                                                        src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                                            <?php else: ?>
                                                <td><img width="40" height="40" class="img-circle"
                                                        src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                                            <?php endif; ?>
                                            <td style="text-align:right;">
                                                <a class="btn" data-toggle="modal"
                                                    data-target="#ModalEdit<?php echo $id; ?>"><span
                                                        class="fa fa-pencil"></span></a>
                                                <a class="btn" data-toggle="modal"
                                                    data-target="#ModalHapus<?php echo $id; ?>"><span
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

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Paket</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/paket/simpan_paket' ?>"
                method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Paket</label>
                        <div class="col-sm-7">
                            <input type="text" name="xnama_paket" class="form-control" id="inputUserName"
                                placeholder="nama_paket" required>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tanggal Keberangkatan</label>
                        <div class="col-sm-7">
                            <input type="date" name="xtgl_keberangkatan" class="form-control" id="inputUserName" placeholder="tgl_keberangkatan" required>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tanggal Keberangkatan</label>
                        <div class="col-sm-7">
                            <input type="date" name="xtgl_keberangkatan" class="form-control" id="inputUserName"
                                placeholder="tgl_keberangkatan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tanggal Kembali</label>
                        <div class="col-sm-7">
                            <input type="date" name="xtgl_kembali" class="form-control" id="inputUserName"
                                placeholder="tgl_kembali" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kota Keberangkatan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xkota_keberangkatan" class="form-control" id="inputUserName"
                                placeholder="kota_keberangkatan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Hotel</label>
                        <div class="col-sm-7">
                            <input type="text" name="xhotel" class="form-control" id="inputUserName" placeholder="hotel"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Maskapai</label>
                        <div class="col-sm-7">
                            <input type="text" name="xmaskapai" class="form-control" id="inputUserName"
                                placeholder="maskapai" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="text" name="xharga" class="form-control" id="inputUserName" placeholder="harga"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Porsi</label>
                        <div class="col-sm-7">
                            <input type="text" name="xporsi" class="form-control" id="inputUserName" placeholder="porsi"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xketerangan" class="form-control" id="inputUserName"
                                placeholder="keterangan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                        <div class="col-sm-7">
                            <input type="file" name="filefoto" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal Edit Album-->
<?php foreach ($data->result_array() as $i):
    $id = $i['id_paket'];
    $nama_paket = $i['nama_paket'];
    $tgl_keberangkatan = $i['tgl_keberangkatan'];
    $tgl_kembali = $i['tgl_kembali'];
    $kota_keberangkatan = $i['kota_keberangkatan'];
    $hotel = $i['hotel'];
    $maskapai = $i['maskapai'];
    $harga = $i['harga'];
    $porsi = $i['porsi'];
    $keterangan = $i['keterangan'];
    $photo = $i['photo'];

    ?>

    <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit paket</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/paket/update_paket' ?>"
                    method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                        <input type="hidden" value="<?php echo $photo; ?>" name="photo">

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama Paket</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnama_paket" value="<?php echo $nama_paket; ?>"
                                    class="form-control" id="inputUserName" placeholder="Nama Paket" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Tanggal Keberangkatan</label>
                            <div class="col-sm-7">
                                <input type="date" name="xtgl_keberangkatan" value="<?php echo $tgl_keberangkatan; ?>"
                                    class="form-control" id="inputUserName" placeholder="Tanggal Keberangkatan" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Tanggal Kembali</label>
                            <div class="col-sm-7">
                                <input type="date" name="xtgl_kembali" value="<?php echo $tgl_kembali; ?>"
                                    class="form-control" id="inputUserName" placeholder="Tanggal Kembali" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Kota Keberangkatan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkota_keberangkatan" value="<?php echo $kota_keberangkatan; ?>"
                                    class="form-control" id="inputUserName" placeholder="Kota Keberangkatan" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Hotel</label>
                            <div class="col-sm-7">
                                <input type="text" name="xhotel" value="<?php echo $hotel; ?>" class="form-control"
                                    id="inputUserName" placeholder="Hotel" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Maskapai</label>
                            <div class="col-sm-7">
                                <input type="text" name="xmaskapai" value="<?php echo $maskapai; ?>" class="form-control"
                                    id="inputUserName" placeholder="Maskapai" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Harga</label>
                            <div class="col-sm-7">
                                <input type="text" name="xharga" value="<?php echo $harga; ?>" class="form-control"
                                    id="inputUserName" placeholder="Harga" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Porsi</label>
                            <div class="col-sm-7">
                                <input type="text" name="xporsi" value="<?php echo $porsi; ?>" class="form-control"
                                    id="inputUserName" placeholder="Porsi" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xketerangan" value="<?php echo $keterangan; ?>"
                                    class="form-control" id="inputUserName" placeholder="Keterangan" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                            <div class="col-sm-7">
                                <input type="file" name="filefoto" />
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
<?php endforeach; ?>
<!--Modal Edit Album-->

<?php foreach ($data->result_array() as $i):
    $id = $i['id_paket'];
    $nama_paket = $i['nama_paket'];
    $tgl_keberangkatan = $i['tgl_keberangkatan'];
    $tgl_kembali = $i['tgl_kembali'];
    $kota_keberangkatan = $i['kota_keberangkatan'];
    $hotel = $i['hotel'];
    $maskapai = $i['maskapai'];
    $harga = $i['harga'];
    $porsi = $i['porsi'];
    $keterangan = $i['keterangan'];
    $photo = $i['photo'];

    ?>
    <!--Modal Hapus Pengguna-->
    <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus paket</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/paket/hapus_paket' ?>"
                    method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                        <input type="hidden" value="<?php echo $photo; ?>" name="photo">
                        <p>Apakah Anda yakin mau menghapus paket <b>
                                <?php echo $nama_paket; ?>
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