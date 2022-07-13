<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-left-success">
                <div class="card-body shadow">
                    <h5 class="font-weight-bold text-gray-600">Biodata Dokter</h5>
                    <p>Anda dapat mengubah biodata pada menu profile</p>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <?= form_open_multipart(base_url('index.php/auth/tambahDokter'), ['id' => 'tambahDokter']); ?>
                            <div class="form-group">
                                <?= form_label('ID Dokter', 'id-dokter', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'id-dokter', 'id' => 'id-dokter', 'class' => 'form-control', 'value' => $idDokter, 'autocomplete' => 'off', 'placeholder' => 'ID Dokter', 'readonly' => 'on']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('id-dokter'); ?></small>
                            </div>
                            <div class="form-group">
                                <?= form_label('Nama', 'nama-dokter', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'nama-dokter', 'id' => 'nama-dokter', 'class' => 'form-control', 'value' => set_value('nama-dokter'), 'autocomplete' => 'off', 'placeholder' => 'Nama']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('nama-dokter'); ?></small>
                            </div>
                            <div class="form-group">
                                <?= form_label('Spesialis', 'spesialis', ['class' => 'h6']); ?>
                                <?= form_dropdown('spesialis', $spesialis, set_value('spesialis'), [
                                    'id' => 'biodata-spesialis',
                                    'class' => 'form-control chosen schosen-select',
                                    'selected' => set_value('spesialis'),
                                ]); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('spesialis'); ?></small>
                            </div>
                            <div class="form-group">
                                <?= form_label('No Telp', 'no-telp', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'no-telp', 'id' => 'no-telp', 'class' => 'form-control', 'value' => set_value('no-telp'), 'autocomplete' => 'off', 'placeholder' => 'No telp', 'type' => 'number']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('no-telp'); ?></small>
                            </div>
                            <div class="form-group">
                                <?= form_label('Alamat', 'alamat-dokter', ['class' => 'h6']); ?>
                                <?= form_textarea(['name' => 'alamat-dokter', 'id' => 'alamat-dokter', 'class' => 'form-control', 'value' => set_value('alamat-dokter'), 'autocomplete' => 'off', 'placeholder' => 'Alamat', 'rows' => '3']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('alamat-dokter'); ?></small>
                            </div>
                        </div>
                        <input type="text" id="lat" name="lat" hidden>
                        <input type="text" id="long" name="long" hidden>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="form-group">
                                <?= form_submit('btnTambahDokter', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        navigator.geolocation.getCurrentPosition(function(location) {
            $("#lat").val(location.coords.latitude)
            $("#long").val(location.coords.longitude)
        })
    </script>