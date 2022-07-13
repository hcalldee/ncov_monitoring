<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Resep</h4>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th scope="col">Dokter</th>
                        <th>Pasien</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($resep as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data->dokter ?></td>
                            <td><?= $data->pasien ?></td>
                            <td align="center">
                                <button class="btn btn-outline-success btn-sm detail-resep" data-toggle="modal" data-target="#modal-detail-resep" data-id="<?= $data->id_resep ?>"><i class="fas fa-info-circle"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class=" modal fade" id="modal-detail-resep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Resep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <?= form_label('Resep', 'nama-resep', ['class' => 'h6']); ?>
                            <?= form_textarea(['name' => 'nama-resep', 'id' => 'nama-resep', 'class' => 'form-control',  'autocomplete' => 'off', 'placeholder' => 'Deskripsi resep . . .', 'rows' => '3', 'disabled' => 'on']); ?>
                            <small id="deskripsi" class="form-text text-danger ml-3"><?= form_error('nama-resep'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
    });

    $('.detail-resep').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/supervisor/getResep",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#nama-resep').val(data.deskripsi);
            }
        });
    });
</script>