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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-striped" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Paket</th>
                                    <th>Id Jamaah</th>
                                    <th>Id Pemesanan</th>
                                    <th>Tipe Paket</th>
                                    <th>Nama Paket</th>
                                    <th>Hotel</th>
                                    <th>Maskapai</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id_paket'];
                                    $id_jamaah = $i['id_jamaah'];
                                    $id_pemesanan = $i['id_pemesanan'];
                                    $tipe_paket = $i['tipe_paket'];
                                    $nama_paket = $i['nama_paket'];
                                    $hotel = $i['hotel'];
                                    $maskapai = $i['maskapai'];
                                    $harga = $i['harga'];
                                    $keterangan = $i['keterangan'];
                                    $photo = $i['photo'];

                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $id_jamaah; ?></td>
                                        <td><?php echo $id_pemesanan; ?></td>
                                        <td><?php echo $tipe_paket; ?></td>
                                        <td><?php echo $nama_paket; ?></td>
                                        <td><?php echo $hotel; ?></td>
                                        <td><?php echo $maskapai; ?></td>
                                        <td><?php echo $harga; ?></td>
                                        <td><?php echo $keterangan; ?></td>
                                        <?php if (empty($photo)) : ?>
                                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                                        <?php else : ?>
                                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->