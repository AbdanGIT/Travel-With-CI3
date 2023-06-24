<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <tr>
        <td width='200'>Nama Buku</td>
        <td>
            <select name="id_buku" id="id_buku" onchange="pilih_buku()" style="width: 200px" class="form-control">
                <option value="">--Pilih--</option>
                <?php
                foreach ($list->result() as $t) {
                    $selected = ($id_member == $t->id_paket) ? 'selected' : '';
                    echo '<option value="' . $t->id_paket . '" ' . $selected . '>' . $t->nama_paket . '</option>';
                }
                ?>
            </select>
        </td>
        <td><input type="text" class="form-control" name="nama_penulis" style="width: 200px" id="nama_penulis" placeholder="Nama Penulis" /></td>
    </tr>



    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

    <script type="text/javascript">
        function pilih_buku() {
            var id_buku = $("#id_buku").val();
            $.ajax({
                url: "<?php echo base_url() ?>index.php/coba/menampilkan_penulis",
                data: {
                    id_buku: id_buku
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $("#nama_penulis").val(data.nama_paket_b);
                }
            });
        }

        $(document).ready(function() {
            $('#id_buku').select2();
        });
    </script>

</body>

</html>