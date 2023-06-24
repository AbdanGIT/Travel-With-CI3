<div class="container">
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
        <div class="card-body">
            <?php foreach ($data as $p) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() . 'assets/images/' . $p->photo; ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <!-- Table rows displaying package details -->
                            <tr>
                                <td>Nama Paket</td>
                                <td><strong><?php echo $p->nama_paket ?></strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Keberangkatan</td>
                                <td><strong><?php echo $p->tgl_keberangkatan ?></strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Kembali</td>
                                <td><strong><?php echo $p->tgl_kembali ?></strong></td>
                            </tr>
                            <tr>
                                <td>Hotel Paket</td>
                                <td><strong><?php echo $p->hotel ?></strong></td>
                            </tr>
                            <tr>
                                <td>Maskapai Paket</td>
                                <td><strong><?php echo $p->maskapai ?></strong></td>
                            </tr>
                            <tr>
                                <td>Porsi Paket</td>
                                <td><strong><?php echo $p->porsi ?></strong></td>
                            </tr>
                            <tr>
                                <td>Keterangan Paket</td>
                                <td><strong><?php echo $p->keterangan ?></strong></td>
                            </tr>
                            <tr>
                                <td>Harga Paket</td>
                                <td><strong>Rp.
                                        <div class="btn btn-sm btn-success">
                                            <?php echo number_format($p->harga, 0, ',', '.'); ?>
                                        </div>
                                    </strong>
                                </td>
                            </tr>

                        </table>
                        <div class="btn-right d-flex justify-content-end">
                            <!-- Buttons for navigation -->
                            <a href="<?php echo base_url() . 'halaman_depan/produk' ?>" class="btn btn-primary">Kembali</a>
                            <a href="<?php echo base_url() . 'halaman_depan/produk/tambah_pemesanan' ?>" class="btn btn-success">Beli</a>
                        </div>

                    </div>
                </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>