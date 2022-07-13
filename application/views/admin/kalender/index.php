<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/simple-calendar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/demo.css">

<div class="container-fluid">
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-bold text-success">Kalender</h5>
                </div>
            </div>
            <hr>
            <div id="container" style="width :100%; height:100%;" class="calendar-container mt-4 shadow p-4 rounded"></div>
        </div>
    </div>
</div>


<?php
$i = 0;
foreach ($jadwal as $data) {
    $dataku[$i] = array(
        'startDate' => $data->tanggal . ' ' . $data->jam,
        'endDate' => $data->tanggal . ' ' . $data->jam,
        'summary' => $data->deskripsi . '<br>' . '<button class="btn btn-light btn-sm detail-tindakan mt-2" data-toggle="modal" data-target="#modal-detail-tindakan-' . $data->id_tindakan . '" data-id="<?= $data->id_tindakan ?>"><i class="fas fa-info-circle"></i></button>'
    );
    $i++; ?>

    <div class="modal fade bd-example-modal-lg" id="modal-detail-tindakan-<?= $data->id_tindakan ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                <?= form_input(['name' => 'id-pasien', 'id' => 'data-pasien', 'class' => 'form-control', 'value' => $data->pasien, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Deskripsi', 'deskripsi', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'deskripsi', 'id' => 'deskripsi', 'class' => 'form-control', 'value' => $data->deskripsi, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Keadaan Umum', 'KU', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'ku', 'id' => 'ku', 'class' => 'form-control', 'value' => $data->Keadaan_Umum, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Kesadaraan', 'kesadaran', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'kesadaran', 'id' => 'kesadaran', 'class' => 'form-control', 'value' => $data->kesadaran, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('CGS', 'cgs', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'cgs', 'id' => 'cgs', 'class' => 'form-control', 'value' => $data->gcs, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Dokter', 'dokter', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'dokter', 'id' => 'dokter', 'class' => 'form-control', 'value' => $data->dokter, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Temperatur', 'temp', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'temp', 'id' => 'temp', 'class' => 'form-control', 'value' => $data->temp, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Denyut Jantung', 'denyut_jantung', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'denyut_jantung', 'id' => 'denyut_jantung', 'class' => 'form-control', 'value' => $data->denyut_jantung, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Tekanan Darah', 'tekanan_darah', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'tekanan_darah', 'id' => 'tekanan_darah', 'class' => 'form-control', 'value' => $data->tekanan_darah, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Jumlah Nafas', 'jml_nafas', ['class' => 'h6']); ?>
                                <?= form_input(['name' => 'jml_nafas', 'id' => 'jml_nafas', 'class' => 'form-control', 'value' => $data->jml_nafas, 'autocomplete' => 'off', 'disabled' => 'on']); ?>
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


<?php }
$dat = json_encode($dataku);
echo '<pre>';
print_r($dat);
echo '</pre>';
?>



<script src="<?= base_url(); ?>assets/js/jquery.simple-calendar.js"></script>

<script>
    $(document).ready(function() {
        $("#container").simpleCalendar({
            fixedStartDay: false,
            disableEmptyDetails: true,
            events: <?= $dat ?>
            // generate new event after tomorrow for one hour

            // {
            //     startDate: '2020-05-12 05:15:00',
            //     endDate: '2020-05-12 05:15:00',
            //     summary: 'Read The sign'
            // },
            // // generate new event for yesterday at noon
            // {
            //     startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
            //     endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
            //     summary: 'Restaurant'
            // },
            // // generate new event for the last two days
            // {
            //     startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
            //     endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
            //     summary: 'Visit of the Louvre'
            // }
        });
    });
</script>