<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-primary">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Edit Kriteria</h5>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <?= form_open_multipart(base_url('kriteria/edit/' . $kriteria->id_kriteria), ['id' => 'editKriteria']); ?>
                    <div class="form-group">
                        <?= form_label('Nama Kriteria', 'nama-kriteria', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'nama-kriteria', 'id' => 'nama-kriteria', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Nama Kriteria', 'value' => $kriteria->nama]); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('nama-kriteria'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Tipe', 'tipe-kriteria', ['class' => 'h6']); ?>
                        <?= form_dropdown('tipe-kriteria', $tipe, $kriteria->type, [
                            'id' => 'tipe-kriteria',
                            'class' => 'form-control chosen schosen-select',
                            'selected' => set_value('tipe-kriteria'),
                        ]); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('tipe-kriteria'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Bobot', 'bobot-kriteria', ['class' => 'h6']); ?>
                        <?= form_dropdown('bobot-kriteria', $bobotKriteria, $kriteria->bobot, [
                            'id' => 'bobot-kriteria',
                            'class' => 'form-control chosen schosen-select',
                            'selected' => set_value('bobot-kriteria'),
                        ]); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('bobot-kriteria'); ?></small>
                    </div>
                    <!-- <div class="form-group">
                        <?= form_label('Bobot', 'bobot-kriteria', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'bobot-kriteria', 'id' => 'bobot-kriteria', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Bobot Kriteria', 'value' => $kriteria->bobot]); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('bobot-kriteria'); ?></small>
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('kriteria') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->