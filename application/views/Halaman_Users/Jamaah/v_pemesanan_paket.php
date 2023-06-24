<div class="container">
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
        <div class="card-body">
            <?php foreach ($data as $p): ?>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo base_url() . 'assets/images/' . $p->photo; ?>" class="card-img-top">
                        <table class="table">
                            <!-- Table rows displaying package details -->
                            <tr>
                                <td>Nama Pemesanan</td>
                                <td><strong>
                                        <?php echo $p->nama_paket ?>
                                    </strong></td>
                            </tr>
                            <tr>
                                <td>Keterangan Paket</td>
                                <td><strong>
                                        <?php echo $p->keterangan ?>
                                    </strong></td>
                            </tr>
                            <tr>
                                <td>Harga Paket</td>
                                <td><strong>Rp.
                                        <span class="btn btn-sm btn-success">
                                            <?php echo number_format($p->harga, 0, ',', '.'); ?>
                                        </span>
                                    </strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <!-- Table rows displaying package details -->
                            <tr>
                                <td>Nama Jamaah</td>
                                <td> <input type="text" class="form-control" name="nama_jamaah" id="nama_jamaah"
                                        placeholder="Masukkan Nama Anda"></td>
                            </tr>
                            <tr>
                                <td>Email Jamaah</td>
                                <td><input type="email" class="form-control" name="email_jamaah" id="email_jamaah"
                                        placeholder="Masukkan Nama Anda"></td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td><input type="tel" class="form-control" name="telepon_jamaah" id="telepon_jamaah"
                                        placeholder="Masukkan Nama Anda"></td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-end">
                            <!-- Buttons for navigation -->
                            <a href="<?php echo base_url() . 'halaman_users/jamaah/produk' ?>"
                                class="btn btn-primary me-2">Kembali</a>
                            <a href="<?php echo base_url() . 'payment' ?>" class="btn btn-success">Bayar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>