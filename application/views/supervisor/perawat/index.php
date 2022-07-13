<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Perawat</h4>
                </div>
                <div class="col-md-6">
                    <!-- <a href="<?= base_url('index.php/admin/tambahDokter') ?>" class="btn btn-success btn-icon-split float-right">
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
                        <th scope="col" width="15%">ID Perawat</th>
                        <th scope="col" width="60%">Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($perawat as $p) : ?>
                        <tr>
                            <td scope="row" align="center"><?= ++$start; ?></td>
                            <td><?= strip_tags($p->id_perawat) ?></td>
                            <td><?= strip_tags($p->nama) ?></td>
                            <td align="center">
                                <button class="btn btn-outline-success btn-sm detail-perawat" data-toggle="modal" data-target="#modal-detail-perawat" data-id="<?= $p->id ?>"><i class="fas fa-info-circle"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class=" modal fade" id="modal-detail-perawat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Perawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= form_label('ID Perawat', 'id-perawat', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'id-perawat', 'id' => 'id-perawat', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('id-perawat'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Nama', 'nama-perawat', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'nama-perawat', 'id' => 'nama-perawat', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('nama-perawat'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('No Telp', 'no-telp', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'no-telp', 'id' => 'no-telp', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('no-telp'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Alamat', 'alamat-perawat', ['class' => 'h6']); ?>
                    <?= form_textarea(['name' => 'alamat-perawat', 'id' => 'alamat-perawat', 'class' => 'form-control', 'value' => set_value('alamat-perawat'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .', 'rows' => '3', 'disabled' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('alamat-perawat'); ?></small>
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

    $('.detail-perawat').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/supervisor/detailPerawat",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id-perawat').val(data.id_perawat);
                $('#nama-perawat').val(data.nama);
                $('#no-telp').val(data.no_telp);
                $('#alamat-perawat').val(data.alamat);
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