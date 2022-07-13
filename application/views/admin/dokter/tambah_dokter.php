<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Dokter</h5>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <?= form_open_multipart(base_url('penyakit/tambahPenyakit'), ['id' => 'tambahPenyakit']); ?>
                    <div class="form-group">
                        <?= form_label('Kode Penyakit', 'kode-penyakit', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'kode-penyakit', 'id' => 'kode-penyakit', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'placeholder' => 'Kode penyakit']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('kode-penyakit'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Penyakit', 'nama-penyakit', ['class' => 'h6']); ?>
                        <?= form_textarea(['name' => 'nama-penyakit', 'id' => 'nama-penyakit', 'class' => 'form-control', 'value' => set_value('nama-penyakit'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('nama-penyakit'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnTambahPenyakit', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('admin/dokter') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->