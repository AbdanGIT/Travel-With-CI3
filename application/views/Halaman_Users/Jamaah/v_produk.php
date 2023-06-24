<section class="our-teachers">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mb-5">Paket</h2>
      </div>
    </div>
    <div class="row">
      <?php foreach ($data->result() as $row): ?>
        <div class="card ml-3 my-3" style="width: 18rem;">
          <img src="<?php echo base_url() . 'assets/images/' . $row->photo; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title mb-1">
              <?php echo $row->nama_paket ?>
            </h2>
            <p class="card-text">Keterangan:<br>
              <?php echo $row->keterangan ?>
            </p>
            <h5 class="card-title">Harga Paket:<br><span class="badge bg-success">
                <?php echo number_format($row->harga, 0, ',', '.'); ?>
              </span></h5>
            <a href="<?php echo base_url() . 'payment' . $row->id_paket ?>" class="btn btn-sm btn-primary">Tambah
              pesanan</a>
            <a href="<?php echo base_url() . 'halaman_users/jamaah/detail/detail_paket/' . $row->id_paket ?>"
              class="btn btn-sm btn-success">Detail</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- End row -->
  </div>
</section>