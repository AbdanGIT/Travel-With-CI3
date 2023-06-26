<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="jumbotron text-center">Paket</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php foreach ($data->result() as $row): ?>
        <div class="col-sm-4">
          <div class="card">
            <img src="<?php echo base_url() . 'assets/images/' . $row->photo; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <form action="<?= base_url() ?>halaman_users/jamaah/produk/details_package" method="get">
                <input type="hidden" value="<?php echo $row->id_paket ?>" name="package_id">
                <input type="hidden" value="<?php echo $row->harga ?>" name="package_price">
                <input type="hidden" value="<?php echo $row->nama_paket ?>" name="package_name">
                <input type="hidden" value="<?php echo $row->photo; ?>" name="icon">
                <input type="hidden" value="<?php echo $row->keterangan; ?>" name="keterangan">
                <h2 class="card-title mb-1">
                  <?php echo $row->nama_paket ?>
                </h2>
                <p class="card-text">Keterangan:<br>
                  <?php echo $row->keterangan ?>
                </p>
                <h5 class="card-title">Harga Paket : Rp.<span class="badge bg-success">
                    <?php echo number_format($row->harga, 0, ',', '.'); ?>
                  </span></h5>
                <div class="form-group col-12">
                  <button type="submit" class="btn btn-block btn-primary stretched-link">
                    <?php echo number_format($row->harga, 0, ',', '.'); ?>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- End row -->
</div>