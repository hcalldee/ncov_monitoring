<!-- Begin Page Content -->

<!-- <div class="container-fluid">
    Page Heading
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Spesialis</h5>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <?= form_open_multipart(base_url('admin/tambahSpesialis'), ['id' => 'tambahSpesialis']); ?>
                    <div class="form-group">
                        <?= form_label('Spesialis', 'spesialis', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'spesialis', 'id' => 'spesialis', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'placeholder' => 'Nama Spesialisasi']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('spesialis'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnTambahPenyakit', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('admin/spesialis') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div> -->
<!-- /.container-fluid -->