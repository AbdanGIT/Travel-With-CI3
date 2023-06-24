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

                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Jamaah</a>
                        </div>
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
                                        <th>Porsi</th>
                                        <th>Penyiar</th>
                                        <th>Perwakilan</th>
                                        <th style="text-align:right;">Aksi</th>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Jamaah</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/kphg/Jamaah/simpan_Jamaah' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama KTP</label>
                        <div class="col-sm-7">
                            <input type="text" name="xnama_ktp" class="form-control" id="inputUserName" placeholder="Nama KTP" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Paspor</label>
                        <div class="col-sm-7">
                            <input type="text" name="xnama_paspor" class="form-control" id="inputUserName" placeholder="Nama Paspor" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">No Identitas</label>
                        <div class="col-sm-7">
                            <input type="text" name="xno_identitas" class="form-control" id="inputUserName" placeholder="no_identitas" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">No Telpon</label>
                        <div class="col-sm-7">
                            <input type="text" name="xno_tlp" class="form-control" id="inputUserName" placeholder="no_tlp" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Ayah</label>
                        <div class="col-sm-7">
                            <input type="text" name="xnama_ayah" class="form-control" id="inputUserName" placeholder="nama_ayah" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" name="xemail" class="form-control" id="inputUserName" placeholder="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <input type="date" name="xtanggal_lahir" class="form-control" id="inputUserName" placeholder="tanggal_lahir" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-sm-7">
                            <input type="text" name="xjenis_kelamin" class="form-control" id="inputUserName" placeholder="jenis_kelamin" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kewarganegaraan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xkewarganegaraan" class="form-control" id="inputUserName" placeholder="kewarganegaraan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
                        <div class="col-sm-7">
                            <input type="text" name="xtempat_lahir" class="form-control" id="inputUserName" placeholder="tempat_lahir" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-7">
                            <input type="text" name="xalamat" class="form-control" id="inputUserName" placeholder="alamat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Pendidikan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xpendidikan" class="form-control" id="inputUserName" placeholder="pendidikan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Provinsi</label>
                        <div class="col-sm-7">
                            <input type="text" name="xprovinsi" class="form-control" id="inputUserName" placeholder="provinsi" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kota</label>
                        <div class="col-sm-7">
                            <input type="text" name="xkota" class="form-control" id="inputUserName" placeholder="kota" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kecamatan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xkecamatan" class="form-control" id="inputUserName" placeholder="kecamatan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kelurahan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xkelurahan" class="form-control" id="inputUserName" placeholder="kelurahan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kategori Usia</label>
                        <div class="col-sm-7">
                            <input type="text" name="xkategori_usia" class="form-control" id="inputUserName" placeholder="kategori_usia" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Status Menikah</label>
                        <div class="col-sm-7">
                            <input type="text" name="xstatus_menikah" class="form-control" id="inputUserName" placeholder="status_menikah" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Pekerjaan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xpekerjaan" class="form-control" id="inputUserName" placeholder="pekerjaan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Status Keluarga</label>
                        <div class="col-sm-7">
                            <input type="text" name="xstatus_keluarga" class="form-control" id="inputUserName" placeholder="status_keluarga" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Ukuran Baju</label>
                        <div class="col-sm-7">
                            <input type="text" name="xukuran_baju" class="form-control" id="inputUserName" placeholder="ukuran_baju" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tipe Anggota</label>
                        <div class="col-sm-7">
                            <input type="text" name="xtipe_anggota" class="form-control" id="inputUserName" placeholder="tipe_anggota" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Porsi</label>
                        <div class="col-sm-7">
                            <input type="text" name="xporsi" class="form-control" id="inputUserName" placeholder="porsi" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Penyiar</label>
                        <div class="col-sm-7">
                            <input type="text" name="xpenyiar" class="form-control" id="inputUserName" placeholder="penyiar" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Perwakilan</label>
                        <div class="col-sm-7">
                            <input type="text" name="xperwakilan" class="form-control" id="inputUserName" placeholder="perwakilan" required>
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

<!--Modal Edit-->
<?php
$no = 0;
foreach ($data->result_array() as $i) :
    $no++;
    $id = $i['id_jamaah'];
    $nama_ktp = $i['nama_ktp'];
    $nama_paspor = $i['nama_paspor'];
    $no_identitas = $i['no_identitas'];
    $no_tlp = $i['no_tlp'];
    $nama_ayah = $i['nama_ayah'];
    $email = $i['email'];
    $tanggal_lahir = $i['tanggal_lahir'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $kewarganegaraan = $i['kewarganegaraan'];
    $tempat_lahir = $i['tempat_lahir'];
    $alamat = $i['alamat'];
    $pendidikan = $i['pendidikan'];
    $provinsi = $i['provinsi'];
    $kota = $i['kota'];
    $kecamatan = $i['kecamatan'];
    $kelurahan = $i['kelurahan'];
    $kategori_usia = $i['kategori_usia'];
    $status_menikah = $i['status_menikah'];
    $pekerjaan = $i['pekerjaan'];
    $status_keluarga = $i['status_keluarga'];
    $ukuran_baju = $i['ukuran_baju'];
    $tipe_anggota = $i['tipe_anggota'];
    $porsi = $i['porsi'];
    $penyiar = $i['penyiar'];
    $perwakilan = $i['perwakilan'];

?>
    <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/kphg/Jamaah/update_jamaah' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama KTP</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnama_ktp" class="form-control" value="<?php echo $nama_ktp; ?>" id="inputUserName" placeholder="Nama KTP" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama Paspor</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnama_paspor" class="form-control" value="<?php echo $nama_paspor; ?>" id="inputUserName" placeholder="Nama Paspor" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">No Identitas</label>
                            <div class="col-sm-7">
                                <input type="text" name="xno_identitas" class="form-control" value="<?php echo $no_identitas; ?>" id="inputUserName" placeholder="no_identitas" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">No Telpon</label>
                            <div class="col-sm-7">
                                <input type="text" name="xno_tlp" class="form-control" value="<?php echo $no_tlp; ?>" id="inputUserName" placeholder="no_tlp" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama Ayah</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnama_ayah" class="form-control" value="<?php echo $nama_ayah; ?>" id="inputUserName" placeholder="nama_ayah" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-7">
                                <input type="text" name="xemail" class="form-control" value="<?php echo $email; ?>" id="inputUserName" placeholder="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
                            <div class="col-sm-7">
                                <input type="date" name="xtanggal_lahir" class="form-control" value="<?php echo $tanggal_lahir; ?>" id="inputUserName" placeholder="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                            <div class="col-sm-7">
                                <input type="text" name="xjenis_kelamin" class="form-control" value="<?php echo $jenis_kelamin; ?>" id="inputUserName" placeholder="jenis_kelamin" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Kewarganegaraan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkewarganegaraan" class="form-control" value="<?php echo $kewarganegaraan; ?>" id="inputUserName" placeholder="kewarganegaraan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
                            <div class="col-sm-7">
                                <input type="text" name="xtempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>" id="inputUserName" placeholder="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-7">
                                <input type="text" name="xalamat" class="form-control" value="<?php echo $alamat; ?>" id="inputUserName" placeholder="alamat" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Pendidikan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xpendidikan" class="form-control" value="<?php echo $pendidikan; ?>" id="inputUserName" placeholder="pendidikan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Provinsi</label>
                            <div class="col-sm-7">
                                <input type="text" name="xprovinsi" class="form-control" value="<?php echo $provinsi; ?>" id="inputUserName" placeholder="provinsi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Kota</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkota" class="form-control" value="<?php echo $kota; ?>" id="inputUserName" placeholder="kota" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Kecamatan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkecamatan" class="form-control" value="<?php echo $kecamatan; ?>" id="inputUserName" placeholder="kecamatan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Kelurahan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkelurahan" class="form-control" value="<?php echo $kelurahan; ?>" id="inputUserName" placeholder="kelurahan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Kategori Usia</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkategori_usia" class="form-control" value="<?php echo $kategori_usia; ?>" id="inputUserName" placeholder="kategori_usia" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Status Menikah</label>
                            <div class="col-sm-7">
                                <input type="text" name="xstatus_menikah" class="form-control" value="<?php echo $status_menikah; ?>" id="inputUserName" placeholder="status_menikah" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Pekerjaan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xpekerjaan" class="form-control" value="<?php echo $pekerjaan; ?>" id="inputUserName" placeholder="pekerjaan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Status Keluarga</label>
                            <div class="col-sm-7">
                                <input type="text" name="xstatus_keluarga" class="form-control" value="<?php echo $status_keluarga; ?>" id="inputUserName" placeholder="status_keluarga" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Ukuran Baju</label>
                            <div class="col-sm-7">
                                <input type="text" name="xukuran_baju" class="form-control" value="<?php echo $ukuran_baju; ?>" id="inputUserName" placeholder="ukuran_baju" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Tipe Anggota</label>
                            <div class="col-sm-7">
                                <input type="text" name="xtipe_anggota" class="form-control" value="<?php echo $tipe_anggota; ?>" id="inputUserName" placeholder="tipe_anggota" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">porsi</label>
                            <div class="col-sm-7">
                                <input type="text" name="xporsi" class="form-control" value="<?php echo $porsi; ?>" id="inputUserName" placeholder="tipe_anggota" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">penyiar</label>
                            <div class="col-sm-7">
                                <input type="text" name="xpenyiar" class="form-control" value="<?php echo $penyiar; ?>" id="inputUserName" placeholder="penyiar" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">perwakilan</label>
                            <div class="col-sm-7">
                                <input type="text" name="xperwakilan" class="form-control" value="<?php echo $perwakilan; ?>" id="inputUserName" placeholder="perwakilan" required>
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



    <!--Modal Hapus Pengguna-->
    <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Jamaah</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'halaman_users/kphg/Jamaah/hapus_Jamaah' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                        <p>Apakah Anda yakin mau menghapus Jamaah <b><?php echo $nama_ktp; ?></b> ?</p>

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