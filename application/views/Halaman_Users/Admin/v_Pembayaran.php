<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pembayaran
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                        <th scope="col">Transaction Time</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Gross Amount</th>
                                        <th scope="col">Transaction Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php
                                    if (is_array($trx) || is_object($trx)) {
                                        foreach ($trx as $row) {
                                            if ($row->status_code == '201') {
                                                $color = "warning";
                                            } else if ($row->status_code == '200') {
                                                $color = "success";
                                            } else {
                                                $color = "danger";
                                            }

                                    ?>
                                            <tr>
                                                <td><?= $row->transaction_time ?></td>
                                                <th><?= $row->order_id ?></th>
                                                <td><?= $row->customer_name ?></td>
                                                <td><?= $row->payment_type ?></td>
                                                <td>Rp <?= number_format($row->gross_amount, 0, ',', '.') ?></td>
                                                <td><span class="badge badge-sm badge-<?= $color ?>"><?= $row->transaction_status ?></span></td>
                                                <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal<?= $row->order_id ?>">Details</button></td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="Modal<?= $row->order_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">DETAILS <?= $row->order_id ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="mb-3">Payment Details</h4>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label">Order ID:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->order_id ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Transaction Id:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->transaction_id ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Customer Name:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->customer_name ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Customer Email:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->customer_email ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Gross Amount:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->gross_amount ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Payment Type:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->payment_type ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label">Transaction Time:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->transaction_time ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Bank:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->bank ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">VA Numbers:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->va_numbers ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Status Message:</label>
                                                                        <input type="text" class="form-control" value="<?= $row->status_message ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label">Transaction Status:</label>
                                                                        <input type="text " class="form-control bg-<?= $color ?>" value="<?= $row->transaction_status ?>" disabled>
                                                                </div>

                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4 class="mb-3">Payment Instruction</h4>
                                                                    <a href="<?= $row->pdf_url ?>" target="_blank" class="btn btn-primary">Download</a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4 class="mb-3">Finish URL</h4>
                                                                    <a href="<?= $row->finish_redirect_url ?>" target="_blank" class="btn btn-primary">Finish Payment</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php }
                                    } ?>
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