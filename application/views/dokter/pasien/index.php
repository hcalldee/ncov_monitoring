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
                                <button class="btn btn-outline-success btn-sm detail-pasien" data-toggle="modal" data-target="#modal-detail-perawat" data-id="<?= $p->id ?>"><i class="fas fa-info-circle"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modal-detail-perawat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Tindakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xl-6">

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

                    <div class="col-xl-6">

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
        </div>
    </div>




    <!-- /.container-fluid -->
    <script>
        $(document).ready(function() {
            $('#table-kriteria').DataTable();
        });

        $('.detail-pasien').on('click', function() {
            id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: "<?= base_url(); ?>index.php/dokter/detailPasien",
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