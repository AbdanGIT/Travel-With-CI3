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
                                        <th>Jenis pembayaran</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data->result_array() as $i) :
                                        $no++;
                                        $id = $i['id_pembayaran'];
                                        $jenis_pembayaran = $i['jenis_pembayaran'];
                                        $metode_pembayaran = $i['metode_pembayaran'];
                                        // $kelas_id = $i['pembayaran_kelas_id'];
                                        $status = $i['status'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $jenis_pembayaran; ?></td>
                                            <td><?php echo $metode_pembayaran; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <!-- <td><?php echo $kelas_nama; ?></td> -->
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
            <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/penyiar/pembayaran/simpan_pembayaran' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Pembayaran</label>
                        <div class="col-sm-7">
                            <select name="xjenis_pembayaran" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Cicilan 3x">Cicilan 3x</option>
                                <option value="Cicilan 6x">Cicilan 6x</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Metode Pembayaran</label>
                        <div class="col-sm-7">
                            <select name="xmetode_pembayaran" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Tranfer">Transfer</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" name="xstatus" class="form-control" id="inputUserName" placeholder="status" required>
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