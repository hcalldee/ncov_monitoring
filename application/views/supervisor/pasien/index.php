<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Pasien</h4>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('index.php/supervisor/tambahPasien') ?>" class="btn btn-success btn-icon-split float-right">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Pasien</span>
                    </a>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th scope="col" width="15%">ID Pasien</th>
                        <th scope="col" width="40%">Nama</th>
                        <th scope="col" width="">Umur</th>
                        <th scope="col" width="">Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($pasien as $p) : ?>
                        <tr>
                            <td scope="row" align="center"><?= ++$start; ?></td>
                            <td><?= strip_tags($p->id_pasien) ?></td>
                            <td><?= strip_tags($p->nama) ?></td>
                            <td><?= strip_tags($p->umur) ?></td>
                            <td><?= strip_tags($p->jenis_kelamin) ?></td>
                            <td align="center">
                                <button class="btn btn-outline-success btn-sm detail-pasien" data-toggle="modal" data-target="#modal-detail-pasien" data-id="<?= $p->id ?>"><i class="fas fa-info-circle"></i></button>
                                <a class="btn btn-outline-warning btn-sm" href="<?= base_url('index.php/supervisor/editPasien/') . $p->id; ?>"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $p->id ?>" data-nama="<?= $p->nama ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modal-detail-pasien" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('ID Pasien', 'id-pasien', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'id-pasien', 'id' => 'id-pasien', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Nama', 'nama', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Umur', 'umur', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'umur', 'id' => 'umur', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Jenis Kelamin', 'jk', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'jk', 'id' => 'jk', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Tinggi Badan', 'tinggi-badan', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'tinggi-badan', 'id' => 'tinggi-badan', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Riwayat Penyakit', 'riwayat-penyakit', ['class' => 'h6']); ?>
                            <?= form_textarea(['name' => 'riwayat-penyakit', 'id' => 'riwayat-penyakit', 'class' => 'form-control', 'value' => set_value('riwayat-penyakit'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .', 'rows' => '3', 'disabled' => 'on']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Berat Badan', 'berat-badan', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'berat-badan', 'id' => 'berat-badan', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Rapid', 'rapid', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'rapid', 'id' => 'rapid', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('PCR', 'pcr', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'pcr', 'id' => 'pcr', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Status', 'status', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'status', 'id' => 'status', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Alamat', 'alamat', ['class' => 'h6']); ?>
                            <?= form_textarea(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control', 'value' => set_value('alamat'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Penyakit . . .', 'rows' => '3', 'disabled' => 'on']); ?>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
    });

    $('.confirm-hapus').on('click', function() {
        Swal.fire({
            title: 'Hapus ' + $(this).data('nama') + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                hapus($(this).data('id'));
            }
        })
    });

    function hapus(id) {
        $.ajax({
            url: '<?= base_url() ?>index.php/supervisor/hapusPasien/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('index.php/supervisor/pasien') ?>';
            }
        });
    }

    $('.detail-pasien').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/supervisor/detailPasien",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id-pasien').val(data.id_pasien);
                $('#nama').val(data.nama);
                $('#umur').val(data.umur);
                $('#jk').val(data.jenis_kelamin);
                $('#tinggi-badan').val(data.tinggi_badan);
                $('#berat-badan').val(data.berat_badan);
                $('#riwayat-penyakit').val(data.riwayat_penyakit);
                $('#alamat').val(data.alamat);
                $('#rapid').val(data.rapid);
                $('#pcr').val(data.pcr);
                $('#status').val(data.status);
            }
        });
    });
</script>