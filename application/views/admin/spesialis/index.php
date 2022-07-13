<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Spesialis</h4>
                </div>
                <div class="col-md-6">
                    <button id="btn-spesialis" class="btn btn-success btn-icon-split float-right" data-toggle="modal" data-target="#modal-spesialis">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Spesialis</span>
                    </button>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th>Spesialis</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($spesialis as $s) : ?>
                        <tr>
                            <td scope="row" align="center"><?= ++$start; ?></td>
                            <td><?= strip_tags($s->nama) ?></td>
                            <td align="center">
                                <button class="btn btn-outline-warning btn-sm edit-spesialis" data-id="<?= $s->id_spesialis ?>" data-toggle="modal" data-target="#modal-spesialis"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $s->id_spesialis ?>" data-nama="<?= $s->nama ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- modal -->
<div class="modal fade" id="modal-spesialis" tabindex="-1" role="dialog" aria-labelledby="modalSpesialis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="titleModalSpesialis">Tambah Spesialis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('index.php/admin/tambahSpesialis'), ['id' => 'formSpesialis']); ?>
                <input type="hidden" id="id-spesialis" name="id">
                <div class="form-group">
                    <?= form_label('Spesialis', 'spesialis', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'spesialis', 'id' => 'spesialis', 'class' => 'form-control', 'value' => strip_tags(set_value('spesialis')), 'autocomplete' => 'off']); ?>
                    <small id="er-spesialis" class="form-text text-danger ml-3"></small>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnSpesialis">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
        $('#btn-spesialis').click(function(e) {
            clear();
            $('#titleModalSpesialis').html('Tambah Spesialis');
        });

        $('.edit-spesialis').click(function(e) {
            e.preventDefault();
            id = $(this).data('id');
            console.log(id);
            clear();
            $.ajax({
                url: '<?= base_url("index.php/admin/getSpesialis") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                success: function(data) {

                    console.log(data);
                    $('#id-spesialis').val(data.id_spesialis);
                    $('#spesialis').val(data.nama);
                    $('#titleModalSpesialis').html('Edit Spesialis');

                    // if (data.status != 'error') {
                    //     window.location.href = '<?= base_url('admin/spesialis') ?>';
                    //     $('#modal-spesialis').modal('hide');
                    // } else {
                    //     $('#er-spesialis').html(data.message);
                    // }
                }
            })

        });

        $('#btnSpesialis').click(function(e) {
            e.preventDefault();
            $('#formSpesialis').submit();
        });

        $('#formSpesialis').submit(function(e) {
            $('#btnSpesialis').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
            $('#btnSpesialis').addClass('disabled');
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("index.php/admin/simpanSpesialis") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {

                    console.log(data);
                    if (data.status != 'error') {
                        window.location.href = '<?= base_url('index.php/admin/spesialis') ?>';
                        $('#modal-spesialis').modal('hide');
                    } else {
                        $('#er-spesialis').html(data.message);
                        $('#btnSpesialis').html('Simpan');
                        $('#btnSpesialis').removeClass('disabled');
                        toastr.error('Tedapat kesalahan pada inputan anda');
                    }
                }
            })
        });
    });

    $('.confirm-hapus').on('click', function() {
        Swal.fire({
            title: 'Hapus ' + $(this).data('nama') + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                hapus($(this).data('id'));
            }
        })
    });

    function hapus(id) {
        $.ajax({
            url: '<?= base_url() ?>index.php/admin/hapusSpesialis/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('index.php/admin/spesialis') ?>';
            }
        });
    }

    function clear() {
        $('#modal-spesialis').find(':input').val('');
        $('#er-spesialis').html('');
    }
</script>