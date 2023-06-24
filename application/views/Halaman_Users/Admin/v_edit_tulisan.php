
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Berita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">Update Berita</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Update Berita</h3>
        </div>
		<?php
        $b=$data->row_array();
    ?>
		<form action="<?php echo base_url().'halaman_users/admin/tulisan/update_tulisan'?>" method="post" enctype="multipart/form-data">

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-10">
              <input type="hidden" name="kode" value="">
              <input type="text" name="xjudul" class="form-control" value="" placeholder="Judul berita atau artikel" required/>
            </div>
            <!-- /.col -->
            <div class="col-md-2">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Update</button>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->

      </div>
	  </div>
      <!-- /.box -->

      <div class="row">
        <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Berita</h3>
            </div>
            <div class="box-body">

			       <textarea id="ckeditor" name="xisi" required><?php echo $b['tulisan_isi'];?></textarea>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pengaturan Lainnya</h3>
            </div>
            <div class="box-body">

              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control select2" name="xkategori" style="width: 100%;" required>
                  <option value="">-Pilih-</option>
        				  <?php
        					foreach ($kat->result_array() as $i) {
                               $kategori_id=$i['kategori_id'];
                               $kategori_nama=$i['kategori_nama'];
                               if($b['tulisan_kategori_id']==$kategori_id)
                                  echo "<option value='$kategori_id' selected>$kategori_nama</option>";
                               else
                                  echo "<option value='$kategori_id'>$kategori_nama</option>";
                  }?>

                </select>
              </div>

			  <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="filefoto" style="width: 100%;">
              </div>
              <!-- /.form group -->
			 <div class="form-group">

              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</form>

          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
