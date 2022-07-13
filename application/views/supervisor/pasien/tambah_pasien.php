<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Pasien</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart(base_url('index.php/supervisor/tambahPasien'), ['id' => 'tambahPasien']); ?>
                    <div class="form-group">
                        <?= form_label('ID Pasien', 'id-pasien', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'id-pasien', 'id' => 'id-pasien', 'class' => 'form-control', 'value' => $idPasien, 'autocomplete' => 'off', 'readonly' => 'on']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('id-pasien'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Nama', 'nama', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control', 'value' => set_value('nama'), 'autocomplete' => 'off']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Umur', 'umur', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'umur', 'id' => 'umur', 'class' => 'form-control', 'value' => set_value('umur'), 'autocomplete' => 'off']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('umur'); ?></small>
                    </div>
                    <?= form_label('Jenis Kelamin', 'jk', ['class' => 'h6']); ?>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <br>
                            <?= form_radio([
                                'name'    => 'jk',
                                'id'      => 'jk1',
                                'value'   => 'Laki-laki',
                                'checked' => set_checkbox('jk', 'Laki-laki'),
                                'style'   => 'margin:10px'
                            ]); ?>
                            <?= form_label('Laki-laki', 'jk1', ['class' => 'form-check-label']); ?>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio([
                                'name'    => 'jk',
                                'id'      => 'jk2',
                                'value'   => 'Perempuan',
                                'checked' => set_checkbox('jk', 'Perempuan'),
                                'style'   => 'margin:10px'
                            ]); ?>
                            <?= form_label('Perempiuan', 'jk2', ['class' => 'form-check-label']); ?>
                        </div>
                        <small class="form-text text-danger ml-3"><?= form_error('jk'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Tinggi Badan', 'tinggi-badan', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'tinggi-badan', 'id' => 'tinggi-badan', 'class' => 'form-control', 'value' => set_value('tinggi-badan'), 'autocomplete' => 'off']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('tinggi-badan'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Berat Badan', 'berat-badan', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'berat-badan', 'id' => 'berat-badan', 'class' => 'form-control', 'value' => set_value('berat-badan'), 'autocomplete' => 'off']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('berat-badan'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Riwayat Penyakit', 'riwayat-penyakit', ['class' => 'h6']); ?>
                        <?= form_textarea(['name' => 'riwayat-penyakit', 'id' => 'riwayat-penyakit', 'class' => 'form-control', 'value' => set_value('riwayat-penyakit'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .', 'rows' => '3']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('riwayat-penyakit'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Alamat', 'alamat', ['class' => 'h6']); ?>
                        <?= form_textarea(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control', 'value' => set_value('alamat'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .', 'rows' => '3']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Rapid', 'rapid', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'rapid', 'id' => 'rapid', 'class' => 'form-control', 'value' => set_value('rapid'), 'autocomplete' => 'off']); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('PCR', 'pcr', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'pcr', 'id' => 'pcr', 'class' => 'form-control', 'value' => set_value('pcr'), 'autocomplete' => 'off']); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Status', 'status', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'status', 'id' => 'status', 'class' => 'form-control', 'value' => set_value('status'), 'autocomplete' => 'off']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnTambahPenyakit', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('index.php/supervisor/pasien') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->