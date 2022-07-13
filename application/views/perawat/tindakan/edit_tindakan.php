<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Tidakan</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart(base_url('index.php/perawat/editTindakan/') . $tindakan->id_tindakan, ['id' => 'EditTindakan']); ?>
                    <div class="form-group">
                        <?= form_label('Pasien', 'pasien', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'pasien', 'id' => 'pasien', 'class' => 'form-control', 'value' => $tindakan->pasien, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('pasien'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Keadaan umum', 'keadaan_umum', ['class' => 'h6']); ?>
                        <?php
                        $options = array(
                            'Baik'         => 'Baik',
                            'Sakit Ringan' => 'Sakit Ringan',
                            'Sakit Berat'  => 'Sakit Berat',
                        );
                        ?>
                        <select class="form-control" name="keadaan_umum" id="keadaan_umum">
                            <option value="">keadaan umum</option>
                            <?php
                            foreach ($options as $dat) {
                                if ($dat == $tindakan->Keadaan_Umum) {
                                    $info = 'selected';
                                } else {
                                    $info = '';
                                }
                            ?>
                                <option value="<?= $dat ?>" <?= $info ?>><?= $dat ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger ml-3"><?= form_error('keadaan_umum'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Temperatur', 'temperatur', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '100', 'name' => 'temperatur', 'id' => 'temperatur', 'class' => 'form-control', 'value' => $tindakan->temp, 'autocomplete' => 'off', 'placeholder' => 'Celcius']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('temperatur'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Tekanan darah', 'tekanan_darah', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '200', 'name' => 'tekanan_darah', 'id' => 'tekanan_darah', 'class' => 'form-control', 'value' => $tindakan->tekanan_darah, 'autocomplete' => 'off', 'placeholder' => 'mmHg']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('tekanan_darah'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Pernafasan', 'jml_nafas', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '200', 'name' => 'jml_nafas', 'id' => 'jml_nafas', 'class' => 'form-control', 'value' => $tindakan->jml_nafas, 'autocomplete' => 'off', 'placeholder' => 'Per Menit']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('jml_nafas'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Dokter', 'dokter', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'dokter', 'id' => 'dokter', 'class' => 'form-control', 'value' => $tindakan->dokter, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('dokter'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Jadwal', 'jadwal', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'jadwal', 'id' => 'jadwal', 'class' => 'form-control', 'value' => $tindakan->deskripsi, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('jadwal'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Denyut Jantung', 'jml_nafas', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '200', 'name' => 'denyut_jantung', 'id' => 'denyut_jantung', 'class' => 'form-control', 'value' => $tindakan->denyut_jantung, 'autocomplete' => 'off', 'placeholder' => 'Per Menit']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('jml_nafas'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('GCS', 'gcs', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '15', 'name' => 'gcs', 'id' => 'gcs', 'class' => 'form-control', 'value' => $tindakan->gcs, 'autocomplete' => 'off', 'placeholder' => '1']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('gcs'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Kesadaran', 'kesadaran', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'kesadaran', 'id' => 'kesadaran', 'class' => 'form-control', 'value' => $tindakan->kesadaran, 'autocomplete' => 'off', 'placeholder' => '']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('kesadaran'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnEditTindakan', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('index.php/perawat/tindakan') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->