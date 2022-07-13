<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Jadwal</h4>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success btn-icon-split float-right" data-toggle="modal" data-target="#modal-jadwal-tambah">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Jadwal</span>
                    </button>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jadwal as $data) { ?>
                        <tr>
                            <td align="center"><?= $no++; ?></td>
                            <td><?= $data->tanggal; ?></td>
                            <td><?= substr($data->jam, 0, 5)   ?></td>
                            <td><?= $data->deskripsi ?></td>
                            <td align="center">
                                <button class="btn btn-outline-warning btn-sm edit-jadwal" data-id="<?= $data->id_jadwal ?>" data-toggle="modal" data-target="#modal-jadwal-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $data->id_jadwal ?>" data-nama="<?= $data->deskripsi ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-jadwal-tambah" tabindex="-1" role="dialog" aria-labelledby="modalSpesialis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="titleModalSpesialis">Tambah Jadwal</h5>
                <button type="button" id="btn-tambah-jadwal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('index.php/supervisor/tambahJadwal'), ['id' => 'tambahJadwal']); ?>
                <div class="form-group">
                    <?= form_label('Tanggal', 'tambah-tanggal', ['class' => 'h6']); ?>
                    <?= form_input(['type' => 'date', 'name' => 'tambah-tanggal', 'id' => 'tambah-tanggal', 'class' => 'form-control', 'value' => '']);
                    ?>
                    <small id="tambah-tgl" class="form-text text-danger ml-3"><?= form_error('tambah-tanggal'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Jam', 'tambah-jam', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'tambah-jam', 'id' => 'tambah-jam', 'class' => 'form-control timepicker-24-hr', 'placeholder' => 'HH:MM', 'value' => '']);
                    ?>
                    <small id="tambah-jm" class="form-text text-danger ml-3"><?= form_error('tambah-jam'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Kegiatan', 'tambah-kegiatan', ['class' => 'h6']); ?>
                    <?= form_textarea(['name' => 'tambah-kegiatan', 'id' => 'tambah-kegiatan', 'class' => 'form-control',  'autocomplete' => 'off', 'placeholder' => 'Deskripsi kegiatan . . .', 'rows' => '3']); ?>
                    <small id="tambah-deskripsi" class="form-text text-danger ml-3"><?= form_error('tambah-kegiatan'); ?></small>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnTambah">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-jadwal-edit" tabindex="-1" role="dialog" aria-labelledby="modalSpesialis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="titleModalSpesialis">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('index.php/supervisor/editJadwal'), ['id' => 'editJadwal']); ?>
                <input type="hidden" id="id-edit" name="id">
                <div class="form-group">
                    <?= form_label('Tanggal', 'tanggal', ['class' => 'h6']); ?>
                    <?= form_input(['type' => 'date', 'name' => 'tanggal', 'id' => 'tanggal', 'class' => 'form-control', 'value' => '2018-07-22']);
                    ?>
                    <small id="tgl" class="form-text text-danger ml-3"><?= form_error('tanggal'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Jam', 'jam', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'jam', 'id' => 'jam', 'class' => 'form-control timepicker-24-hr', 'placeholder' => 'HH:MM', 'value' => '']);
                    ?>
                    <small class="form-text text-danger ml-3"><?= form_error('jam'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Kegiatan', 'nama-kegiatan', ['class' => 'h6']); ?>
                    <?= form_textarea(['name' => 'nama-kegiatan', 'id' => 'nama-kegiatan', 'class' => 'form-control',  'autocomplete' => 'off', 'placeholder' => 'Deskripsi kegiatan . . .', 'rows' => '3']); ?>
                    <small id="deskripsi" class="form-text text-danger ml-3"><?= form_error('nama-kegiatan'); ?></small>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
        $('.wickedpicker').css('z-index', '999999');
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
            url: '<?= base_url() ?>index.php/supervisor/hapusJadwal/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('index.php/supervisor/jadwal') ?>';
            }
        });
    }

    $('#btnTambah').click(function(e) {
        e.preventDefault();
        $('#tambahJadwal').submit();
    });

    $('#tambahJadwal').submit(function(e) {
        $('#btnTambah').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
        $('#btnTambah').addClass('disabled');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url("index.php/supervisor/tambahJadwal") ?>',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                if (data.status != 'error') {
                    console.log(data.status)
                    $('#modal-jadwal').modal('hide');
                    window.location.href = '<?= base_url('index.php/supervisor/jadwal') ?>';
                } else {
                    $('#tambah-tgl').html(data.tambah_tgl_error);
                    $('#tambah-jm').html(data.tambah_jam_error);
                    $('#tambah-deskripsi').html(data.tambah_kegiatan_error);
                    $('#btnTambah').html('Simpan');
                    $('#btnTambah').removeClass('disabled');
                    toastr.error('Tedapat kesalahan pada inputan anda');
                }
            }
        })
    });


    $('.edit-jadwal').click('.timepicker-24-hr', function(e) {
        e.preventDefault();
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '<?= base_url("index.php/supervisor/getJadwal") ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $('#id-edit').val(data.id_jadwal);
                $('#tanggal').val(data.tanggal);
                $('#jam').val(data.jam);
                $('#nama-kegiatan').val(data.deskripsi);
                $('#titleModalSpesialis').html('Edit Spesialis');
            }
        })

        $('#btnEdit').click(function(e) {
            e.preventDefault();
            $('#editJadwal').submit();
        });

        $('#editJadwal').submit(function(e) {
            $('#btnEdit').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
            $('#btnEdit').addClass('disabled');
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("index.php/supervisor/editJadwal") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    if (data.status != 'error') {
                        console.log(data.status)
                        if (data.message == 'Jadwal tidak ada perubahan') {
                            toastr.error(data.message);
                        } else {
                            $('#modal-jadwal').modal('hide');
                            window.location.href = '<?= base_url('index.php/supervisor/jadwal') ?>';
                        }
                    } else {
                        $('#tgl').html(data.tgl_error);
                        $('#jam').html(data.jam_error);
                        $('#deskripsi').html(data.nama_kegiatan_error);
                        toastr.error('Tedapat kesalahan pada inputan anda');
                    }
                    $('#btnEdit').html('Simpan');
                    $('#btnEdit').removeClass('disabled');
                }
            })
        });
    });

    $('.edit-jadwal, #btn-tambah-jadwal').click(function(e) {
        clear();
    });

    function clear() {
        $('#tgl').html('');
        $('#jam').html('');
        $('#deskripsi').html('');
        $('#tambah-tgl').html('');
        $('#tambah-jm').html('');
        $('#tambah-deskripsi').html('');
    }
</script>