<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Edit Tidakan</h5>
            <p><span class="text-danger" style="font-size: 25px;">*</span> Wajib diisi</p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart(base_url('index.php/admin/editTindakan/') . $tindakan->id_tindakan, ['id' => 'EditTindakan']); ?>
                    <div class="form-group">
                        <?= form_label('Pasien <span class="text-danger" style="font-size: 20px;">*</span>', 'pasien', ['class' => 'h6']); ?>
                        <select class="form-control" name="pasien" id="pasien">
                            <option value="">Pasien</option>
                            <?php
                            foreach ($pasien as $dat) {
                                if ($dat->nama == $tindakan->pasien) {
                                    $info = 'selected';
                                } else {
                                    $info = '';
                                }
                            ?>
                                <option value="<?= $dat->id_pasien ?>" <?= $info ?>><?= $dat->nama ?></option>
                            <?php } ?>
                        </select>
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
                            <option value="">-- Pilih Keadaan Umum --</option>
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
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '100', 'name' => 'tekanan_darah', 'id' => 'tekanan_darah', 'class' => 'form-control', 'value' => $tindakan->tekanan_darah, 'autocomplete' => 'off', 'placeholder' => 'mmHg']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('tekanan_darah'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Pernafasan', 'jml_nafas', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '100', 'name' => 'jml_nafas', 'id' => 'jml_nafas', 'class' => 'form-control', 'value' => $tindakan->jml_nafas, 'autocomplete' => 'off', 'placeholder' => 'Per Menit']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('jml_nafas'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Denyut Jantung', 'jml_nafas', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'number', 'min' => '1', 'max' => '200', 'name' => 'denyut_jantung', 'id' => 'denyut_jantung', 'class' => 'form-control', 'value' => $tindakan->denyut_jantung, 'autocomplete' => 'off', 'placeholder' => 'Per Menit']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('jml_nafas'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Jadwal <span class="text-danger" style="font-size: 20px;">*</span>', 'jadwal', ['class' => 'h6']); ?>
                        <select class="form-control" name="jadwal" id="jadwal">
                            <option value="">-- Pilih Jadwal --</option>
                            <?php
                            foreach ($jadwal as $dat) {
                                if ($dat->deskripsi == $tindakan->deskripsi) {
                                    $info = 'selected';
                                } else {
                                    $info = '';
                                }
                            ?>
                                <option value="<?= $dat->id_jadwal ?>" <?= $info ?>><?= $dat->deskripsi ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger ml-3"><?= form_error('jadwal'); ?></small>
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
                    <div class="form-group">
                        <?= form_label('Dokter <span class="text-danger" style="font-size: 20px;">*</span>', 'dokter', ['class' => 'h6']); ?>
                        <select class="form-control" name="dokter" id="dokter">
                            <option value="">-- Pilih Dokter --</option>
                            <?php
                            foreach ($dokter as $dat) {
                                if ($dat->nama == $tindakan->dokter) {
                                    $info = 'selected';
                                } else {
                                    $info = '';
                                }
                            ?>
                                <option value="<?= $dat->id_dokter ?>" <?= $info ?>><?= $dat->nama ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger ml-3"><?= form_error('dokter'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Perawat <span class="text-danger" style="font-size: 20px;">*</span>', 'perawat', ['class' => 'h6']); ?>
                        <select class="form-control" name="perawat" id="perawat">
                            <option value="">-- Pilih Perawat --</option>
                            <?php
                            foreach ($perawat as $dat) {
                                if ($dat->nama == $tindakan->perawat) {
                                    $info = 'selected';
                                } else {
                                    $info = '';
                                }
                            ?>
                                <option value="<?= $dat->id_perawat ?>" <?= $info ?>><?= $dat->nama ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger ml-3"><?= form_error('perawat'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnEditTindakan', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('index.php/admin/tindakan') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->