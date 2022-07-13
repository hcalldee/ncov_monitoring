<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron text-center img-fluid" style="background-image: url(<?= base_url('assets/img/jumbotron/rs1.jpg') ?>);">
                        <img src="<?= base_url('assets/img/thumbnail/thumb_') . $user->image; ?>" class="img-circle2 shadow">
                        <?php if ($user->role_id == '1') : ?>
                            <h4 class="mt-3 text-gray-700 font-weight-bold">ADMINISTRATOR</h4>
                        <?php else : ?>
                            <h4 class="mt-3 text-gray-700 font-weight-bold"><?= $biodata->nama ?></h4>
                            <h6 class=""><?= $user->role ?></h6>
                        <?php endif; ?>
                    </div>
                    <div class="" style="margin-top: -74px">
                        <nav>
                            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-makanan" role="tab" aria-controls="nav-makanan" aria-selected="true"><span class="font-weight-bold">Profile</span></a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-minuman" role="tab" aria-controls="nav-minuman" aria-selected="false"><span class="font-weight-bold">Pengaturan</span></a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- biodata -->
                            <div class="tab-pane fade show active mt-3" id="nav-makanan" role="tabpanel" aria-labelledby="nav-makanan-tab">
                                <?php if ($user->role_id == '1') :  ?>
                                    <p class="mb-0">Status</p>
                                    <p class="font-weight-bold mb-5 pb-5">Administrator</p>
                                <?php else : ?>
                                    <p style="font-size: 20px;"><i class="fas fa-fw fa-user mr-1"></i>Biodata Pribadi</p>
                                    <hr>
                                    <a class="float-right text-gray-800" href="" data-toggle="modal" data-target="#modal-profile"><i class="fas fa-pencil-alt mr-1"></i>Edit</a>
                                    <?php if ($user->role_id == '3') : ?>
                                        <p class="mb-0">ID Dokter</p>
                                        <p class="font-weight-bold"><?= $biodata->id_dokter ?></p>
                                    <?php elseif ($user->role_id == '4') : ?>
                                        <p class="mb-0">ID Perawat</p>
                                        <p class="font-weight-bold"><?= $biodata->id_perawat ?></p>
                                    <?php endif; ?>
                                    <p class="mb-0">Nama</p>
                                    <p class="font-weight-bold"><?= $biodata->nama ?></p>
                                    <p class="mb-0">No Telp</p>
                                    <p class="font-weight-bold"><?= $biodata->no_telp ?></p>
                                    <p class="mb-0">Alamat</p>
                                    <p class="font-weight-bold"><?= $biodata->alamat ?></p>
                                    <?php if ($user->role_id == '3') : ?>
                                        <p class="mb-0">Spesialis</p>
                                        <p class="font-weight-bold"><?= $biodata->spesialis ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <!-- tidak terdaftar -->

                            <div class="tab-pane fade" id="nav-minuman" role="tabpanel" aria-labelledby="nav-minuman-tab">
                                <div class="row mt-3">
                                    <div class="col-md-6">

                                        <p style="font-size: 20px;"><i class="fas fa-fw fa-lock mr-1"></i>Ganti Password</p>
                                        <?= form_open_multipart(base_url('index.php/profile/editProfile'), ['id' => 'formPassword']); ?>
                                        <!-- <input type="hidden" id="id-user" name="id-user"> -->
                                        <div class="form-group">
                                            <?= form_label('Password Lama', 'password', ['class' => 'h6']); ?>
                                            <?= form_input(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off']); ?>
                                            <small id="er-password" class="form-text text-danger ml-3"></small>
                                        </div>
                                        <div class="form-group">
                                            <?= form_label('Password Baru', 'password-baru', ['class' => 'h6']); ?>
                                            <?= form_input(['name' => 'password-baru', 'id' => 'password-baru', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off']); ?>
                                            <small id="er-password-baru" class="form-text text-danger ml-3"></small>
                                        </div>
                                        <div class="form-group">
                                            <?= form_label('Re-Type Password Baru', 'password-baru2', ['class' => 'h6']); ?>
                                            <?= form_input(['name' => 'password-baru2', 'id' => 'password-baru2', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off']); ?>
                                            <small id="er-password-baru2" class="form-text text-danger ml-3"></small>
                                        </div>
                                        <?= form_close(); ?>
                                        <button class="btn btn-outline-success float-right" id="btnPassword">Simpan</button>
                                    </div>
                                    <div class="col-md-6">
                                        <p style="font-size: 20px;"><i class="fas fa-fw fa-images mr-1"></i>Ganti Foto Profil</p>
                                        <?= form_label('Foto dengan ekstensi .jpg .jpeg .png (max. 2048 KB)', 'foto-profil', ['class' => 'p']); ?>
                                        <div class="file-loading">
                                            <input id="foto-profil" name="foto-profil" type="file" multiple>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="titleModalSpesialis">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('index.php/profile/editProfile'), ['id' => 'formProfile']); ?>
                <!-- <input type="hidden" id="id-user" name="id-user"> -->
                <div class="form-group">
                    <?= form_label('Nama', 'nama', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control', 'value' => $biodata->nama, 'autocomplete' => 'off']); ?>
                    <small id="er-nama" class="form-text text-danger ml-3"></small>
                </div>
                <div class="form-group">
                    <?= form_label('No Telp', 'no-telp', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'no-telp', 'id' => 'no-telp', 'class' => 'form-control', 'value' =>  $biodata->no_telp, 'autocomplete' => 'off', 'type' => 'number']); ?>
                    <small id="er-no-telp" class="form-text text-danger ml-3"></small>
                </div>
                <div class="form-group">
                    <?= form_label('Alamat', 'alamat', ['class' => 'h6']); ?>
                    <?= form_textarea(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control', 'value' =>  $biodata->alamat, 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .', 'rows' => '3']); ?>
                    <small id="er-alamat" class="form-text text-danger ml-3"></small>
                </div>

                <?php if ($user->role_id == '3') : ?>
                    <div class="form-group">
                        <?= form_label('Spesialis', 'spesialis', ['class' => 'h6']); ?>
                        <?= form_dropdown('spesialis', $spesialis, $biodata->id_spesialis, [
                            'id' => 'biodata-spesialis',
                            'class' => 'form-control chosen schosen-select',
                            'selected' => set_value('spesialis'),
                        ]); ?>
                        <small id="er-spesialis" class="form-text text-danger ml-3"></small>
                    </div>
                <?php endif; ?>

                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <button class="btn btn-outline-success float-right" id="btnProfile">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();

        $('#btnProfile').click(function(e) {
            e.preventDefault();
            $('#formProfile').submit();
        });

        $('#btnPassword').click(function(e) {
            e.preventDefault();
            $('#formPassword').submit();
        });

        $('#formProfile').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= base_url("index.php/profile/editProfile") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {
                    if (data.status != 'error') {
                        window.location.href = '<?= base_url('index.php/profile') ?>';
                        $('#modal-profile').modal('hide');
                    } else {
                        $.each(data.error, function(index, val) {
                            if (val != '') {
                                $('#er-' + index).html(val);
                            } else {
                                $('#er-' + index).html('');
                            }
                        });
                        toastr.error(data.message);
                    }
                }
            })
        });

        $('#formPassword').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("index.php/profile/editPassword") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {
                    if (data.status != 'error') {
                        Swal.fire({
                            icon: 'success',
                            text: 'Password berhasil diganti',
                            confirmButtonColor: '#1cc88a'
                        });
                        clearPassword();
                    } else {
                        $.each(data.error, function(index, val) {
                            if (val != '') {
                                $('#er-' + index).html(val);
                            } else {
                                $('#er-' + index).html('');
                            }


                        });
                        if (data.message == 'Password lama salah') {
                            Swal.fire({
                                icon: 'error',
                                text: data.message,
                                confirmButtonColor: '#1cc88a'
                            });
                            clearPassword();
                        }
                        toastr.error(data.message);
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
            confirmButtonColor: '#4e73df',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                hapus($(this).data('id'));
            }
        })
    });

    $(document).ready(function() {
        $("#foto-profil").fileinput({
            language: "id",
            theme: "fa",
            browseClass: "btn btn-success",
            showUpload: true,
            dropZoneEnabled: false,
            maxFileCount: 1,
            maxFileSize: 2048,
            allowedFileExtensions: ["jpg", "jpeg", "png"],
            uploadUrl: '<?php echo base_url('index.php/profile/uploadFoto') ?>',
            fileActionSettings: {
                // Disable
                showUpload: false,
                // showZoom: false,
            },
        }).on('fileuploaded', function(e, data) {
            var out = '';
            res = `<p>` + data.response.text + `</p>`
            $('[id="su_' + data.response.berkasNama + '"]').removeClass('hide').addClass(data.response.status).html(res);
            // window.location.href = '<?= base_url('index.php/profile') ?>'; dibaiki...!!!
        });



    });

    function clearPassword() {
        $('#er-password').html('');
        $('#er-password-baru').html('');
        $('#er-password-baru2').html('');
        $('#password').val('');
        $('#password-baru').val('');
        $('#password-baru2').val('');
    }
</script>