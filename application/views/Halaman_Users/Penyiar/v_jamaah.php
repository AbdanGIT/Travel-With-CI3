<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Jamaah
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Jamaah</li>
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
                                    <th>Nama Paspor</th>
                                    <th>No Identitas</th>
                                    <th>No Telpon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Nama Ayah</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kategori Usia</th>
                                    <th>Nama Paket</th>
                                    <th>Status</th>
                                    <th>Porsi</th>
                                    <th>Penyiar</th>
                                    <th>Perwakilan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id_jamaah'];
                                    $nama_paspor = $i['nama_paspor'];
                                    $no_identitas = $i['no_identitas'];
                                    $no_tlp = $i['no_tlp'];
                                    $email = $i['email'];
                                    $alamat = $i['alamat'];
                                    $nama_ayah = $i['nama_ayah'];
                                    $tanggal_lahir = $i['tanggal_lahir'];
                                    $jenis_kelamin = $i['jenis_kelamin'];
                                    $kategori_usia = $i['kategori_usia'];
                                    $nama_paket = $i['nama_paket'];
                                    $status = $i['status'];
                                    $porsi = $i['porsi'];
                                    $penyiar = $i['penyiar'];
                                    $perwakilan = $i['perwakilan'];


                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $nama_paspor; ?></td>
                                        <td><?php echo $no_identitas; ?></td>
                                        <td><?php echo $no_tlp; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $alamat; ?></td>
                                        <td><?php echo $nama_ayah; ?></td>
                                        <td><?php echo $tanggal_lahir; ?></td>
                                        <td><?php echo $jenis_kelamin; ?></td>
                                        <td><?php echo $kategori_usia; ?></td>
                                        <td><?php echo $nama_paket; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $porsi; ?></td>
                                        <td><?php echo $penyiar; ?></td>
                                        <td><?php echo $perwakilan; ?></td>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->