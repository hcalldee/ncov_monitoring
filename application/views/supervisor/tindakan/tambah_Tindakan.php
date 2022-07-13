<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Tidakan</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart(base_url('admin/tambahTindakan'), ['id' => 'tambahTindakan']); ?>
                    <div class="form-group">
                        <?= form_label('Pasien', 'pasien', ['class' => 'h6']); ?>
                        <select class="form-control" name="pasien" id="pasien">
                            <option value="">Pasien</option>
                            <?php
                            foreach ($pasien as $dat) { ?>
                                <option value="<?= $dat->id_pasien ?>"><?= $dat->nama ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger ml-3"><?= form_error('pasien'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Jadwal', 'jadwal', ['class' => 'h6']); ?>
                        <select class="form-control" name="jadwal" id="jadwal">
                            <option value="">Jadwal</option>
                            <?php
                            foreach ($jadwal as $dat) { ?>
                                <option value="<?= $dat->id_jadwal ?>"><?= $dat->deskripsi ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger ml-3"><?= form_error('jadwal'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Dokter', 'dokter', ['class' => 'h6']); ?>
                        <select class="form-control" name="dokter" id="dokter">
                            <option value="">Dokter</option>
                            <?php
                            foreach ($dokter as $dat) { ?>
                                <option value="<?= $dat->id_dokter ?>"><?= $dat->nama ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger ml-3"><?= form_error('dokter'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Perawat', 'perawat', ['class' => 'h6']); ?>
                        <select class="form-control" name="perawat" id="perawat">
                            <option value="">Perawat</option>
                            <?php
                            foreach ($perawat as $dat) { ?>
                                <option value="<?= $dat->id_perawat ?>"><?= $dat->nama ?></option>
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
                        <?= form_submit('btnTambahTindakan', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('admin/tindakan') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->