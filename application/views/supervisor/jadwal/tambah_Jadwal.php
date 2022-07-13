<!-- Begin Page Content -->
<!-- Page Heading -->

<div class="container-fluid">
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Jadwal</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart(base_url('admin/tambahJadwal'), ['id' => 'tambahJadwal']); ?>
                    <div class="form-group">
                        <?= form_label('Tanggal', 'tanggal', ['class' => 'h6']); ?>
                        <?= form_input(['type' => 'date', 'name' => 'tanggal', 'id' => 'tanggal', 'min' => '2018-01-01', 'max' => '2030-01-01', 'class' => 'form-control', 'value' => '']);
                        ?>
                        <small class="form-text text-danger ml-3"><?= form_error('tanggal'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Jam', 'jam', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'jam', 'id' => 'jam', 'class' => 'form-control timepicker-24-hr', 'placeholder' => 'HH:MM', 'value' => '']);
                        ?>
                        <small class="form-text text-danger ml-3"><?= form_error('jam'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Kegiatan', 'nama-kegiatan', ['class' => 'h6']); ?>
                        <?= form_textarea(['name' => 'nama-kegiatan', 'id' => 'nama-kegiatan', 'class' => 'form-control', 'value' => set_value('nama-kegiatan'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi kegiatan . . .', 'rows' => '3']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('nama-kegiatan'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnTambahPenyakit', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('admin/jadwal') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->