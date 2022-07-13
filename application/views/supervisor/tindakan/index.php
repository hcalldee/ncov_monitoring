<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Tindakan</h4>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success btn-icon-split float-right" id="btn-tambah-tindakan" data-toggle="modal" data-target="#modal-tindakan-tambah">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Tindakan</span>
                    </button>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th>Tanggal</th>
                        <th scope="col">Pasien</th>
                        <th scope="col">Dokter</th>
                        <th scope="col">Perawat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tindakan as $data) { ?>
                        <tr>
                            <td align="center"><?= $no ?></td>
                            <td><?= $data->tanggal ?></td>
                            <td><?= $data->pasien ?></td>
                            <td><?= $data->dokter ?></td>
                            <td><?= $data->perawat ?></td>
                            <td align="center">
                                <button class="btn btn-outline-success btn-sm detail-tindakan" data-toggle="modal" data-target="#modal-detail-tindakan" data-id="<?= $data->id_tindakan ?>"><i class="fas fa-info-circle"></i></button>
                                <button class="btn btn-outline-warning btn-sm edit-tindakan" data-id="<?= $data->id_tindakan ?>" data-toggle="modal" data-target="#modal-tindakan-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $data->id_tindakan ?>" data-nama="<?= $data->pasien ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tindakan-tambah" tabindex="-1" role="dialog" aria-labelledby="modalSpesialis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="titleModalSpesialis">Tambah Tindakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart(base_url('index.php/supervisor/tambahTindakan'), ['id' => 'tambahTindakan']); ?>
                        <div class="form-group">
                            <?= form_label('Pasien', 'tambah_pasien', ['class' => 'h6']); ?>
                            <select class="form-control" name="tambah_pasien" id="tambah_pasien">
                                <option value="">-- Pilih Pasien --</option>
                                <?php
                                foreach ($pasien as $dat) { ?>
                                    <option value="<?= $dat->id_pasien ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="tambah_pasien_error" class="form-text text-danger ml-3"><?= form_error('pasien'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Jadwal', 'tambah_jadwal', ['class' => 'h6']); ?>
                            <select class="form-control" name="tambah_jadwal" id="tambah_jadwal">
                                <option value="">-- Pilih Jadwal --</option>
                                <?php
                                foreach ($jadwal as $dat) { ?>
                                    <option value="<?= $dat->id_jadwal ?>"><?= $dat->deskripsi ?></option>
                                <?php } ?>
                            </select>
                            <small id="tambah_jadwal_error" class="form-text text-danger ml-3"><?= form_error('jadwal'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Dokter', 'tambah_dokter', ['class' => 'h6']); ?>
                            <select class="form-control" name="tambah_dokter" id="tambah_dokter">
                                <option value="">-- Pilih Dokter --</option>
                                <?php
                                foreach ($dokter as $dat) { ?>
                                    <option value="<?= $dat->id_dokter ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="tambah_dokter_error" class="form-text text-danger ml-3"><?= form_error('dokter'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Perawat', 'tambah_perawat', ['class' => 'h6']); ?>
                            <select class="form-control" name="tambah_perawat" id="tambah_perawat">
                                <option value="">-- Pilih Perawat --</option>
                                <?php
                                foreach ($perawat as $dat) { ?>
                                    <option value="<?= $dat->id_perawat ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="tambah_perawat_error" class="form-text text-danger ml-3"><?= form_error('perawat'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnTambah">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modal-detail-tindakan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Tindakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Nama Pasien', 'id-pasien', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'id-pasien', 'id' => 'data-pasien', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Deskripsi', 'deskripsi', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'deskripsi', 'id' => 'deskripsi', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Keadaan Umum', 'KU', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'ku', 'id' => 'ku', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Kesadaraan', 'kesadaran', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'kesadaran', 'id' => 'kesadaran', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('CGS', 'cgs', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'cgs', 'id' => 'cgs', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Jam', 'jam', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'jam', 'id' => 'jam', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Temperatur', 'temp', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'temp', 'id' => 'temp', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Denyut Jantung', 'denyut_jantung', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'denyut_jantung', 'id' => 'denyut_jantung', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Tekanan Darah', 'tekanan_darah', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'tekanan_darah', 'id' => 'tekanan_darah', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Jumlah Nafas', 'jml_nafas', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'jml_nafas', 'id' => 'jml_nafas', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
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


<div class="modal fade" id="modal-tindakan-edit" tabindex="-1" role="dialog" aria-labelledby="modalSpesialis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="titleModalSpesialis">Edit Tindakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $this->load->helper('form');
                        ?>
                        <?= form_open_multipart(base_url('index.php/supervisor/editTindakan'), ['id' => 'editTindakan']); ?>
                        <input type="hidden" id="id-edit" name="id">
                        <div class="form-group">
                            <?= form_label('Pasien', 'edit_pasien', ['class' => 'h6']); ?>
                            <select class="form-control" name="edit_pasien" id="edit_pasien">
                                <option value="">-- Pilih Pasien --</option>
                                <?php
                                foreach ($pasien as $dat) { ?>
                                    <option value="<?= $dat->id_pasien ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="edit_pasien_error" class="form-text text-danger ml-3"><?= form_error('pasien'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Jadwal', 'edit_jadwal', ['class' => 'h6']); ?>
                            <select class="form-control" name="edit_jadwal" id="edit_jadwal">
                                <option value="">-- Pilih Jadwal --</option>
                                <?php
                                foreach ($jadwal as $dat) { ?>
                                    <option value="<?= $dat->id_jadwal ?>"><?= $dat->deskripsi ?></option>
                                <?php } ?>
                            </select>
                            <small id="edit_jadwal_error" class="form-text text-danger ml-3"><?= form_error('jadwal'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Dokter', 'edit_dokter', ['class' => 'h6']); ?>
                            <select class="form-control" name="edit_dokter" id="edit_dokter">
                                <option value="">-- Pilih Dokter --</option>
                                <?php
                                foreach ($dokter as $dat) { ?>
                                    <option value="<?= $dat->id_dokter ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="edit_dokter_error" class="form-text text-danger ml-3"><?= form_error('dokter'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Perawat', 'edit_perawat', ['class' => 'h6']); ?>
                            <select class="form-control" name="edit_perawat" id="edit_perawat">
                                <option value="">-- Pilih Perawat --</option>
                                <?php
                                foreach ($perawat as $dat) { ?>
                                    <option value="<?= $dat->id_perawat ?>"><?= $dat->nama ?></option>
                                <?php } ?>
                            </select>
                            <small id="edit_perawat_error" class="form-text text-danger ml-3"><?= form_error('perawat'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnEdit">Simpan</button>
            </div>
            <?php form_close() ?>
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
            url: '<?= base_url() ?>index.php/supervisor/hapusTindakan/',
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('index.php/supervisor/tindakan') ?>';
            }
        });
    }

    $('.detail-tindakan').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/supervisor/getinfo",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#data-pasien').val(data.pasien);
                $('#ku').val(data.Keadaan_Umum);
                $('#deskripsi').val(data.deskripsi);
                $('#temp').val(data.temp);
                $('#tekanan_darah').val(data.tekanan_darah);
                $('#jml_nafas').val(data.jml_nafas);
                $('#denyut_jantung').val(data.denyut_jantung);
                $('#cgs').val(data.gcs);
                $('#kesadaran').val(data.kesadaran);
                var dat = data.jam;
                $('#jam').val(dat.substr(0, 5));
                $('#perawat').val(data.perawat);
                // $('#id-pasien').val(data.id_pasien);
            }
        });
    });


    $('.edit-tindakan').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/supervisor/getTindakan",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id-edit').val(data.id_tindakan);
                $('#edit_pasien').val(data.id_pasien).change();
                $('#edit_jadwal').val(data.id_jadwal).change();
                $('#edit_dokter').val(data.id_dokter).change();
                $('#edit_perawat').val(data.id_perawat).change();
            }
        })

        $('#btnEdit').click(function(e) {
            e.preventDefault();
            $('#editTindakan').submit();
        });

        $('#editTindakan').submit(function(e) {
            $('#btnEdit').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
            $('#btnEdit').addClass('disabled');
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("index.php/supervisor/editTindakan") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    if (data.status != 'error') {
                        console.log(data.status)
                        if (data.message == 'Tindakan tidak ada perubahan') {
                            toastr.error(data.message);
                        } else {
                            $('#modal-resep').modal('hide');
                            window.location.href = '<?= base_url('index.php/supervisor/tindakan') ?>';
                        }
                    } else {
                        $('#edit_pasien_error').html(data.edit_pasien_error);
                        $('#edit_jadwal_error').html(data.edit_jadwal_error);
                        $('#edit_dokter_error').html(data.edit_dokter_error);
                        $('#edit_perawat_error').html(data.edit_perawat_error);
                        toastr.error('Tedapat kesalahan pada inputan anda');
                    }
                    $('#btnEdit').html('Simpan');
                    $('#btnEdit').removeClass('disabled');
                }
            })
        });
    });

    $('#btnTambah').click(function(e) {
        e.preventDefault();
        $('#btnTambah').html('Simpan');
        $('#btnTambah').removeClass('disabled');
        $('#tambahTindakan').submit();
    });

    $('#tambahTindakan').submit(function(e) {
        $('#btnTambah').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
        $('#btnTambah').addClass('disabled');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url("index.php/supervisor/tambahTindakan") ?>',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                if (data.status != 'error') {
                    console.log(data.status)
                    $('#modal-tindakan').modal('hide');
                    window.location.href = '<?= base_url('index.php/supervisor/tindakan') ?>';
                } else {
                    $('#tambah_pasien_error').html(data.tambah_pasien_error);
                    $('#tambah_jadwal_error').html(data.tambah_jadwal_error);
                    $('#tambah_dokter_error').html(data.tambah_dokter_error);
                    $('#tambah_perawat_error').html(data.tambah_perawat_error);
                    $('#btnTambah').html('Simpan');
                    $('#btnTambah').removeClass('disabled');
                    toastr.error('Tedapat kesalahan pada inputan anda');
                }
            }
        })
    });

    $('#btn-tambah-tindakan, .edit-tindakan').click(function(e) {
        clear();
    });

    function clear() {
        $('#tambah_pasien_error').html('');
        $('#tambah_jadwal_error').html('');
        $('#tambah_dokter_error').html('');
        $('#tambah_perawat_error').html('');
        $('#edit_pasien_error').html('');
        $('#edit_jadwal_error').html('');
        $('#edit_dokter_error').html('');
        $('#edit_perawat_error').html('');
    }
</script>