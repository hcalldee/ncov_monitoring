<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Dokter</h4>
                </div>
                <div class="col-md-6">
                    <!-- <a href="<?= base_url('admin/tambahDokter') ?>" class="btn btn-success btn-icon-split float-right">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Dokter</span>
                    </a> -->
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th scope="col" width="15%">ID Dokter</th>
                        <th scope="col" width="60%">Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($dokter as $d) : ?>
                        <tr>
                            <td scope="row" align="center"><?= ++$start; ?></td>
                            <td><?= strip_tags($d->id_dokter) ?></td>
                            <td><?= strip_tags($d->nama) ?></td>
                            <td align="center">
                                <button class="btn btn-outline-success btn-sm detail-dokter" data-toggle="modal" data-target="#modal-detail-dokter" data-id="<?= $d->id ?>"><i class="fas fa-info-circle"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class=" modal fade" id="modal-detail-dokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= form_label('ID Dokter', 'id-dokter', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'id-dokter', 'id' => 'id-dokter', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('id-dokter'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Nama', 'nama-dokter', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'nama-dokter', 'id' => 'nama-dokter', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('nama-dokter'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('No Telp', 'no-telp', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'no-telp', 'id' => 'no-telp', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('no-telp'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Alamat', 'alamat-dokter', ['class' => 'h6']); ?>
                    <?= form_textarea(['name' => 'alamat-dokter', 'id' => 'alamat-dokter', 'class' => 'form-control', 'value' => set_value('alamat-dokter'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .', 'rows' => '3', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('alamat-dokter'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Spesialis', 'dokter-spesialis', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'dokter-spesialis', 'id' => 'dokter-spesialis', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('dokter-spesialis'); ?></small>
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

    // $('.confirm-hapus').on('click', function() {
    //     Swal.fire({
    //         title: 'Hapus ' + $(this).data('nama') + ' ?',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#4e73df',
    //         cancelButtonColor: '#e74a3b',
    //         confirmButtonText: 'Hapus',
    //         cancelButtonText: 'Batal'
    //     }).then((result) => {
    //         if (result.value) {
    //             hapus($(this).data('id'));
    //         }
    //     })
    // });

    $('.detail-dokter').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/supervisor/detailDokter",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id-dokter').val(data.id_dokter);
                $('#nama-dokter').val(data.nama);
                $('#no-telp').val(data.no_telp);
                $('#alamat-dokter').val(data.alamat);
                if (!data.spesialis) {
                    $('#dokter-spesialis').val('-');
                } else {
                    $('#dokter-spesialis').val(data.spesialis);
                }
            }
        });
    });

    function hapus(id) {
        $.ajax({
            url: '<?= base_url() ?>kriteria/hapus/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('kriteria') ?>';
            }
        });
    }
</script>