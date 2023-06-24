<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pembayaran
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Pembayaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah pembayaran</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-striped" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Harga</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Createdate</th>
                                        <th>UpdateDate</th>
                                        <th>Status</th>
                                        <th style="text-align:right;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data->result_array() as $i) :
                                        $no++;
                                        $id = $i['id_pembayaran'];
                                        $metode_pembayaran = $i['metode_pembayaran'];
                                        $status_pembayaran = $i['status_pembayaran'];
                                        $harga = $i['harga'];
                                        $tanggal_transaksi = $i['tanggal_transaksi'];
                                        $createdate = $i['createdate'];
                                        $updatedate = $i['updatedate'];
                                        $status = $i['status'];

                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $metode_pembayaran; ?></td>
                                            <td><?php echo $status_pembayaran; ?></td>
                                            <td><?php echo $harga; ?></td>
                                            <td><?php echo $tanggal_transaksi; ?></td>
                                            <td><?php echo $createdate; ?></td>
                                            <td><?php echo $updatedate; ?></td>
                                            <td><?php echo $status; ?></td>

                                            <td style="text-align:right;">
                                                <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span class="fa fa-pencil"></span></a>
                                                <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah pembayaran</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/kphg/detail_pembayaran/simpan_detail_pembayaran' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Metode Pembayaran</label>
                        <div class="col-sm-7">
                            <select name="xmetode_pembayaran" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Cicilan 3x">Cicilan 3x</option>
                                <option value="Cicilan 6x">Cicilan 6x</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Status Pembayaran</label>
                        <div class="col-sm-7">
                            <select name="xstatus_pembayaran" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Transfer">Transfer</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="text" name="xharga" class="form-control" id="inputUserName" placeholder="Harga" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tanggal Transaksi</label>
                        <div class="col-sm-7">
                            <input type="date" name="xtanggal_transaksi" class="form-control" id="inputUserName" placeholder="Tanggal Transaksi" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Createdate</label>
                        <div class="col-sm-7">
                            <input type="date" name="xcreatedate" class="form-control" id="inputUserName" placeholder="Createdate" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Updatedate</label>
                        <div class="col-sm-7">
                            <input type="date" name="xupdatedate" class="form-control" id="inputUserName" placeholder="Updatedate" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" name="xstatus" class="form-control" id="inputUserName" placeholder="Status" required>
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

<!--Modal Edit -->
<?php foreach ($data->result_array() as $i) :
    $id = $i['id_pembayaran'];
    $metode_pembayaran = $i['metode_pembayaran'];
    $status_pembayaran = $i['status_pembayaran'];
    $harga = $i['harga'];
    $tanggal_transaksi = $i['tanggal_transaksi'];
    $createdate = $i['createdate'];
    $updatedate = $i['updatedate'];
    $status = $i['status'];
?>

    <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit pembayaran</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/kphg/detail_pembayaran/update_detail_pembayaran' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>">


                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Metode Pembayaran</label>
                            <div class="col-sm-7">
                                <select name="xmetode_pembayaran" class="form-control" required>
                                    <option value="<?php echo $metode_pembayaran; ?>"><?php echo $metode_pembayaran; ?></option>
                                    <option value="Cicilan 3x">Cicilan 3x</option>
                                    <option value="Cicilan 6x">Cicilan 6x</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Status Pembayaran</label>
                            <div class="col-sm-7">
                                <select name="xstatus_pembayaran" class="form-control" required>
                                    <option value="<?php echo $status_pembayaran; ?>"><?php echo $status_pembayaran; ?></option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Harga</label>
                            <div class="col-sm-7">
                                <input type="text" name="xharga" class="form-control" value="<?php echo $harga; ?>" id="inputUserName" placeholder="Harga" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Tanggal Transaksi</label>
                            <div class="col-sm-7">
                                <input type="date" name="xtanggal_transaksi" class="form-control" value="<?php echo $tanggal_transaksi; ?>" id="inputUserName" placeholder="Tanggal Transaksi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Createdate</label>
                            <div class="col-sm-7">
                                <input type="date" name="xcreatedate" class="form-control" value="<?php echo $createdate; ?>" id="inputUserName" placeholder="Createdate" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">UpdateDate</label>
                            <div class="col-sm-7">
                                <input type="date" name="xupdatedate" class="form-control" value="<?php echo $updatedate; ?>" id="inputUserName" placeholder="UpdateDate" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                            <div class="col-sm-7">
                                <input type="text" name="xstatus" class="form-control" value="<?php echo $status; ?>" id="inputUserName" placeholder="Status" required>
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

<?php foreach ($data->result_array() as $i) :
    $id = $i['id_pembayaran'];
    $metode_pembayaran = $i['metode_pembayaran'];
    $status_pembayaran = $i['status_pembayaran'];
    $harga = $i['harga'];
    $tanggal_transaksi = $i['tanggal_transaksi'];
    $createdate = $i['createdate'];
    $updatedate = $i['updatedate'];
    $status = $i['status'];
?>
    <!--Modal Hapus Pengguna-->
    <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus pembayaran</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/kphg/detail_pembayaran/hapus_detail_pembayaran' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                        <p>Apakah Anda yakin mau menghapus pembayaran Nomor <b><?php echo $no++; ?></b> ?</p>

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