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
                <div class="col-md-6">
                    <button href="<?= base_url('admin/tambahResep') ?>" id="btn-tambah-resep" data-toggle="modal" data-target="#modal-tambah-resep" class="btn btn-success btn-icon-split float-right">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Resep</span>
                    </button>
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
                                <button class="btn btn-outline-warning btn-sm edit-resep" data-id="<?= $data->id_resep ?>" data-toggle="modal" data-target="#modal-edit-resep"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $data->id_resep ?>" data-nama="<?= $data->pasien ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class=" modal fade" id="modal-tambah-resep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Resep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart(base_url('index.php/admin/tambahResep'), ['id' => 'tambahResep']); ?>
                        <div class="form-group">
                            <?= form_label('Pasien', 'pasien', ['class' => 'h6']); ?>
                            <select class="form-control" name="tambah_pasien" id="tambah_pasien">
                                <option value="">-- Pilih Pasien --</option>
                                <?php
                                foreach ($pasien as $dat) {
                                ?>
                                    <option value="<?= $dat->id_pasien ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="tambah_pasien_error" class="form-text text-danger ml-3"><?= form_error('tambah-pasien'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Dokter', 'dokter', ['class' => 'h6']); ?>
                            <select class="form-control" name="tambah_dokter" id="tambah_dokter">
                                <option value="">-- Pilih Dokter --</option>
                                <?php
                                foreach ($dokter as $dat) { ?>
                                    <option value="<?= $dat->id_dokter ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="tambah_dokter_error" class="form-text text-danger ml-3"><?= form_error('tambah-pasien'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Resep', 'tambah-resep', ['class' => 'h6']); ?>
                            <?= form_textarea(['name' => 'tambah-resep', 'id' => 'tambah-resep', 'class' => 'form-control',  'autocomplete' => 'off', 'placeholder' => 'Deskripsi resep . . .', 'rows' => '3']); ?>
                            <small id="tambah_deskripsi_error" class="form-text text-danger ml-3"><?= form_error('tambah-resep'); ?></small>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnTambah">Tambah</button>
            </div>
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
            <?= form_close()  ?>
        </div>
    </div>
</div>

<div class=" modal fade" id="modal-edit-resep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Resep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart(base_url('index.php/admin/editResep'), ['id' => 'editResep']); ?>
                        <input type="hidden" id="id-edit" name="id">
                        <div class="form-group">
                            <?= form_label('Pasien', 'pasien', ['class' => 'h6']); ?>
                            <select class="form-control" name="pasien" id="pasien">
                                <option value="">Pasien</option>
                                <?php
                                foreach ($pasien as $dat) {
                                ?>
                                    <option value="<?= $dat->id_pasien ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="pasien_error" class="form-text text-danger ml-3"><?= form_error('pasien'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Dokter', 'dokter', ['class' => 'h6']); ?>
                            <select class="form-control" name="dokter" id="dokter">
                                <option value="">Dokter</option>
                                <?php
                                foreach ($dokter as $dat) { ?>
                                    <option value="<?= $dat->id_dokter ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="dokter_error" class="form-text text-danger ml-3"><?= form_error('pasien'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Resep', 'edit-resep', ['class' => 'h6']); ?>
                            <?= form_textarea(['name' => 'edit-resep', 'id' => 'edit-resep', 'class' => 'form-control',  'autocomplete' => 'off', 'placeholder' => 'Deskripsi resep . . .', 'rows' => '3']); ?>
                            <small id="deskripsi_error" class="form-text text-danger ml-3"><?= form_error('edit-resep'); ?></small>
                        </div>
                    </div>
                    <?php form_close(); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnEdit">Simpan</button>
            </div>

        </div>
    </div>
</div>



<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
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
            url: '<?= base_url() ?>index.php/admin/hapusResep',
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('index.php/admin/resep') ?>';
            }
        });
    }

    $('.detail-resep').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/admin/getResep",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id-edit').val(data.id_resep);
                $('#nama-resep').val(data.deskripsi);
                $('#edit-resep').val(data.deskripsi);
            }
        });
    });

    $('.edit-resep').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/admin/getResep",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id-edit').val(data.id_resep);
                $('#pasien').val(data.id_pasien).change();
                $('#dokter').val(data.id_dokter).change();
                $('#edit-resep').val(data.deskripsi);
            }
        })

        $('#btnEdit').click(function(e) {
            e.preventDefault();
            $('#editResep').submit();
        });

        $('#editResep').submit(function(e) {
            $('#btnEdit').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
            $('#btnEdit').addClass('disabled');
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("index.php/admin/editResep") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    if (data.status != 'error') {
                        console.log(data.status)
                        $('#modal-resep').modal('hide');
                        if (data.message == 'Resep tidak ada perubahan') {
                            toastr.error('Resep tidak ada perubahan');
                        } else {
                            window.location.href = '<?= base_url('index.php/admin/resep') ?>';
                        }
                    } else {
                        $('#dokter_error').html(data.dokter_error);
                        $('#pasien_error').html(data.pasien_error);
                        $('#deskripsi_error').html(data.deskripsi_error);
                    }
                    $('#btnEdit').html('Simpan');
                    $('#btnEdit').removeClass('disabled');
                }
            })
        });
    });
    $('#btnTambah').click(function(e) {
        e.preventDefault();
        $('#tambahResep').submit();
    });

    $('#btn-tambah-resep').click(function(e) {
        clear();
    });

    $('#tambahResep').submit(function(e) {
        $('#btnTambah').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
        $('#btnTambah').addClass('disabled');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url("index.php/admin/tambahResep") ?>',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                if (data.status != 'error') {
                    console.log(data.status)
                    $('#modal-resep').modal('hide');
                    window.location.href = '<?= base_url('index.php/admin/resep') ?>';
                } else {
                    $('#tambah_dokter_error').html(data.tambah_dokter_error);
                    $('#tambah_pasien_error').html(data.tambah_pasien_error);
                    $('#tambah_deskripsi_error').html(data.tambah_deskripsi_error);
                    $('#btnTambah').html('Simpan');
                    $('#btnTambah').removeClass('disabled');
                    toastr.error('Tedapat kesalahan pada inputan anda');
                }
            }
        })
    });

    function clear() {
        $('#tambah_dokter_error').html('');
        $('#tambah_pasien_error').html('');
        $('#tambah_deskripsi_error').html('');
        $('#dokter_error').html('');
        $('#pasien_error').html('');
        $('#deskripsi_error').html('');
    }
</script>