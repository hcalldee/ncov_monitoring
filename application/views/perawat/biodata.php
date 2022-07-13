<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-left-success">
                <div class="card-body shadow">
                    <h5 class="font-weight-bold text-gray-600">Biodata Perawat</h5>
                    <p>Anda dapat mengubah biodata pada menu profile</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <?= form_open_multipart(base_url('index.php/auth/tambahPerawat'), ['id' => 'tambahPerawat']); ?>
                            <div class="form-group">
                                <?= form_label('ID Perawat', 'id-perawat', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'id-perawat', 'id' => 'id-perawat', 'class' => 'form-control', 'value' => $idPerawat, 'autocomplete' => 'off', 'placeholder' => 'ID perawat', 'readonly' => 'on']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('id-perawat'); ?></small>
                            </div>
                            <div class="form-group">
                                <?= form_label('Nama', 'nama-perawat', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'nama-perawat', 'id' => 'nama-perawat', 'class' => 'form-control', 'value' => set_value('nama-perawat'), 'autocomplete' => 'off', 'placeholder' => 'Nama']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('nama-perawat'); ?></small>
                            </div>
                            <div class="form-group">
                                <?= form_label('No Telp', 'no-telp', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'no-telp', 'id' => 'no-telp', 'class' => 'form-control', 'value' => set_value('no-telp'), 'autocomplete' => 'off', 'placeholder' => 'No telp', 'type' => 'number']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('no-telp'); ?></small>
                            </div>
                            <div class="form-group">
                                <?= form_label('Alamat', 'alamat-perawat', ['class' => 'h6']); ?>
                                <?= form_textarea(['name' => 'alamat-perawat', 'id' => 'alamat-perawat', 'class' => 'form-control', 'value' => set_value('alamat-perawat'), 'autocomplete' => 'off', 'placeholder' => 'Alamat', 'rows' => '3']); ?>
                                <small class="form-text text-danger ml-3"><?= form_error('alamat-perawat'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" id="lat" name="lat" hidden>
                        <input type="text" id="long" name="long" hidden>
                        <div class="col-md-12">
                            <hr>
                            <div class="form-group">
                                <?= form_submit('btnTambahPerawat', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
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