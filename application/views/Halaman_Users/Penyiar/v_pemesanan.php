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
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Pemesanan</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-striped" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemesanan</th>
                                        <th>Nama Paket</th>
                                        <th>Jenis Pemesanan</th>
                                        <th>Total Harga</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data->result_array() as $i) :
                                        $no++;
                                        $id = $i['id_pemesanan'];
                                        $nama_pemesanan = $i['nama_pemesanan'];
                                        $nama_paket = $i['nama_paket'];
                                        $jenis_pemesanan = $i['jenis_pemesanan'];
                                        $total_harga = $i['total_harga'];
                                        $keterangan = $i['keterangan'];

                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $nama_pemesanan; ?></td>
                                            <td><?php echo $nama_paket; ?></td>
                                            <td><?php echo $jenis_pemesanan; ?></td>
                                            <td><?php echo $total_harga; ?></td>
                                            <td><?php echo $keterangan; ?></td>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Pemesanan</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/penyiar/pemesanan/simpan_pemesanan' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Pemesanan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xnama_pemesanan" class="form-control" id="inputUserName" placeholder="Nama Pemesanan" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Paket</label>
                        <div class="col-sm-7">
                            <select name="xnama_paket" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <?php
                                foreach ($kategori->result_array() as $k) {
                                    $id_kelas = $k['id_pemesanan'];
                                    $nm_kelas = $k['nama_paket'];

                                ?>
                                    <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Pemesanan</label>
                        <div class="col-sm-7">
                            <select name="xjenis_pemesanan" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <?php
                                foreach ($kategori->result_array() as $k) {
                                    $id_kelas = $k['id_pemesanan'];
                                    $nm_kelas = $k['jenis_pemesanan'];

                                ?>
                                    <option value="<?php echo $id_kelas; ?>"><?php echo $nm_kelas; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Total Harga</label>
                        <div class="col-sm-7">
                            <input type="text" name="xtotal_harga" class="form-control" id="inputUserName" placeholder="Total Harga" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xketerangan" class="form-control" id="inputUserName" placeholder="Kategori" required>
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