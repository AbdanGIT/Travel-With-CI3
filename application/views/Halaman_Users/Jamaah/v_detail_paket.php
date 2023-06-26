<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-KhFCAz9zKjFT3KfB"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<div class="container mt-4">
    <div class="jumbotron text-center">

        <img class="card-img-top" src="<?php echo base_url() . 'assets/images/' . $this->input->get('icon') ?>"
            alt="Card image" style="max-width:500px;"><br>
        <small>PACKAGE ID:
            <?= $this->input->get('package_id') ?>
        </small>
        <h1>
            <?= $this->input->get('package_name') ?>
        </h1>

        <p>
            <?= $this->input->get('keterangan') ?>
        </p>
        <h3>Complete the form!</h3>
        <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <input type="hidden" id="package_id" value="<?= $this->input->get('package_id') ?>">
            <input type="hidden" id="package_name" value="<?= $this->input->get('package_name') ?>">
            <input type="hidden" id="package_price" value="<?= $this->input->get('package_price') ?>">
            <button type="submit" id="pay-button" class="btn btn-primary">BUY PAKET</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#pay-button').click(function (event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");
        var name = $("#name").val();
        var email = $("#email").val();
        var package_id = $("#package_id").val();
        var package_name = $("#package_name").val();
        var package_price = $("#package_price").val();
        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/snap/token',
            data: {
                name: name,
                email: email,
                package_id: package_id,
                package_name: package_name,
                package_price: package_price
            },
            cache: false,

            success: function (data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function (result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function (result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function (result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>
</body>
<br>
<hr>