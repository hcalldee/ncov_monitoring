<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Tindakan</h4>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th>Tanggal</th>
                        <th scope="col">Pasien</th>
                        <th scope="col">Dokter</th>
                        <th scope="col">Perawat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tindakan as $data) {
                        if ($data->dokter == $session->nama) { ?>
                            <tr>
                                <td align="center"><?= $no ?></td>
                                <td><?= $data->tanggal ?></td>
                                <td><?= $data->pasien ?></td>
                                <td><?= $data->dokter ?></td>
                                <td><?= $data->perawat ?></td>
                                <td align="center">
                                    <button class="btn btn-outline-success btn-sm detail-tindakan" data-toggle="modal" data-target="#modal-detail-tindakan" data-id="<?= $data->id_tindakan ?>"><i class="fas fa-info-circle"></i></button>
                                </td>
                            </tr>
                    <?php $no++;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal-detail-tindakan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Nama Pasien', 'id-pasien', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'id-pasien', 'id' => 'data-pasien', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Deskripsi', 'deskripsi', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'deskripsi', 'id' => 'deskripsi', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Keadaan Umum', 'KU', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'ku', 'id' => 'ku', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Kesadaraan', 'kesadaran', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'kesadaran', 'id' => 'kesadaran', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('GCS', 'gcs', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'gcs', 'id' => 'gcs', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Jam', 'jam', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'jam', 'id' => 'jam', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Temperatur', 'temp', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'temp', 'id' => 'temp', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Denyut Jantung', 'denyut_jantung', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'denyut_jantung', 'id' => 'denyut_jantung', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Tekanan Darah', 'tekanan_darah', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'tekanan_darah', 'id' => 'tekanan_darah', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Jumlah Nafas', 'jml_nafas', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'jml_nafas', 'id' => 'jml_nafas', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
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
</div>




<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
    });

    $('.detail-tindakan').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/dokter/getTindakan",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#data-pasien').val(data.pasien);
                $('#ku').val(data.Keadaan_Umum);
                $('#deskripsi').val(data.deskripsi);
                $('#temp').val(data.temp);
                $('#tekanan_darah').val(data.tekanan_darah);
                $('#jml_nafas').val(data.jml_nafas);
                $('#denyut_jantung').val(data.denyut_jantung);
                $('#gcs').val(data.gcs);
                $('#kesadaran').val(data.kesadaran);
                var dat = data.jam;
                $('#jam').val(dat.substr(0, 5));
                $('#perawat').val(data.perawat);
                // $('#id-pasien').val(data.id_pasien);
            }
        });
    });
</script>