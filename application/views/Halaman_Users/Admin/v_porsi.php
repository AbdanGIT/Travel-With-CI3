<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Porsi Penyiar
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Prosi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Porsi Penyiar</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-striped" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Identitas</th>
                                        <th>No Telpon</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Perwakian</th>
                                        <th>Porsi</th>
                                        <th>Sisa Porsi</th>



                                        <th style="text-align:right;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data2->result_array() as $i) :
                                        $no++;
                                        $id = $i['id_jamaah'];
                                        $nama_paspor = $i['nama_paspor'];
                                        $no_identitas = $i['no_identitas'];
                                        $no_tlp = $i['no_tlp'];
                                        $email = $i['email'];
                                        $alamat = $i['alamat'];
                                        $perwakilan = $i['perwakilan'];
                                        $porsi = $i['porsi'];

                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $nama_paspor; ?></td>
                                            <td><?php echo $no_identitas; ?></td>
                                            <td><?php echo $no_tlp; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td><?php echo $perwakilan; ?></td>
                                            <td><?php echo $porsi; ?></td>
                                            <td><?php echo $porsi; ?></td>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Porsi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/porsi/simpan_porsi' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php
                    foreach ($data2->result_array() as $k) {
                        $id_jamaah = $k['id_jamaah'];
                        $nama_paspor = $k['nama_paspor'];

                    ?>
                        <input type="hidden" name="kode" value="<?php echo $id_jamaah; ?>">
                    <?php } ?>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Penyiar</label>
                        <div class="col-sm-7">
                            <select name="xnama_paspor" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <?php
                                foreach ($data2->result_array() as $k) {
                                    $id_jamaah = $k['id_jamaah'];
                                    $nama_paspor = $k['nama_paspor'];

                                ?>
                                    <option value="<?php echo $id_jamaah; ?>"><?php echo $nama_paspor; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Porsi</label>
                        <div class="col-sm-7">
                            <input type="text" name="xporsi" class="form-control" id="inputUserName" placeholder="porsi" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Paket</label>
                        <div class="col-sm-7">
                            <select name="xpaket" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Safire">Safire</option>
                                <option value="Diamond">Diamond</option>
                                <option value="Spesial">Spesial</option>

                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select name="xstatus" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                                <option value="Sudah Lunas">Sudah Lunas</option>
                            </select>
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
<?php foreach ($data->result_array() as $i) :
    $id = $i['id_pembayaran'];
    $jenis_pembayaran = $i['jenis_pembayaran'];
    $metode_pembayaran = $i['metode_pembayaran'];
    $status = $i['status'];
?>

    <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Porsi</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/pembayaran/update_pembayaran' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>">

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Jenis Pembayaran</label>
                            <div class="col-sm-7">
                                <select name="xjenis_pembayaran" class="form-control" required>
                                    <option value="<?php echo $jenis_pembayaran; ?>"><?php echo $jenis_pembayaran; ?></option>
                                    <option value="Cicilan 3x">Cicilan 3x</option>
                                    <option value="Cicilan 6x">Cicilan 6x</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Metode Pembayaran</label>
                            <div class="col-sm-7">
                                <select name="xmetode_pembayaran" class="form-control" required>
                                    <option value="<?php echo $metode_pembayaran; ?>"><?php echo $metode_pembayaran; ?></option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                            <div class="col-sm-7">
                                <select name="xstatus" class="form-control" required>
                                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                    <option value="Sudah Lunas">Sudah Lunas</option>
                                </select>
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
    $jenis_pembayaran = $i['jenis_pembayaran'];
    $metode_pembayaran = $i['metode_pembayaran'];
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
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/admin/pembayaran/hapus_pembayaran' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                        <p>Apakah Anda yakin mau menghapus pembayaran <b><?php echo $jenis_pembayaran; ?></b> ?</p>

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