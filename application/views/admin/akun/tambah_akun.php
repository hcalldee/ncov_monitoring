<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Akun</h5>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <?= form_open_multipart(base_url('admin/tambahAkun'), ['id' => 'tambahPenyakit']); ?>
                    <div class="form-group">
                        <?= form_label('Username', 'username', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control', 'value' => strip_tags($username), 'readonly' => 'on']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('username'); ?></small>
                    </div>
                    <?= form_label('Role', 'role', ['class' => 'h6']); ?>
                    <?= form_dropdown('role', $role, '', [
                        'id' => 'role',
                        'class' => 'form-control chosen schosen-select',
                        'selected' => set_value('role'),
                    ]); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('role'); ?></small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnTambahPenyakit', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('admin/akun') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>



    <!-- /.container-fluid -->