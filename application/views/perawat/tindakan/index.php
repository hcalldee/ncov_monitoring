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
                <div class="col-md-6">
                    <?php
                    $now = time();
                    foreach ($tindakan as $data) {
                        if (
                            $data->perawat == $session->nama
                            && $data->tanggal == date("Y-m-d", $now)
                        ) {
                            $status = "ada";
                            break;
                        } else {
                            $status = "";
                        }
                    }
                    if ($status == "ada") { ?>
                        <a class="btn btn-success btn-icon-split float-right" id="print" href="<?= base_url('index.php/perawat/print') ?>" target="_blank">
                            <span class="icon text-white-60">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Print Tindakan</span>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-responsive table-hover table-bordered" style="width:100%">
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
                    // echo '<pre>';
                    // print_r(date("Y-m-d", $now));
                    // echo '</pre>';
                    $no = 1;
                    $now = time();
                    foreach ($tindakan as $data) {
                        if (
                            $data->perawat == $session->nama
                            && $data->tanggal == date("Y-m-d", $now)
                        ) {
                    ?>
                            <tr>
                                <td align="center"><?= $no ?></td>
                                <td><?= $data->tanggal ?></td>
                                <td><?= $data->pasien ?></td>
                                <td><?= $data->dokter ?></td>
                                <td><?= $data->perawat ?></td>
                                <td align="center">
                                    <button class="btn btn-outline-warning btn-sm detail-tindakan" data-toggle="modal" data-target="#modal-detail-tindakan" data-id="<?= $data->id_tindakan ?>"><i class="fas fa-info"></i></button>
                                    <a class="btn btn-outline-warning btn-sm" href="<?= base_url('index.php/perawat/editTindakan/') . $data->id_tindakan; ?>"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                    <?php
                            $no++;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class=" modal fade" id="modal-detail-tindakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                            <?= form_label('CGS', 'cgs', ['class' => 'h6']); ?>
                            <?= form_input(['name' => 'cgs', 'id' => 'cgs', 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off', 'disabled' => 'on']); ?>
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


<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
    });

    $('.detail-tindakan').on('click', function() {
        id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url(); ?>index.php/perawat/getTindakan",
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
                $('#cgs').val(data.gcs);
                $('#kesadaran').val(data.kesadaran);
                var dat = data.jam;
                $('#jam').val(dat.substr(0, 5));
                $('#perawat').val(data.perawat);
                // $('#id-pasien').val(data.id_pasien);
            }
        });
    });
</script>