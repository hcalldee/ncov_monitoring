<style>
    #mapid {
        height: 400px;
    }
</style>
<?php flash(); ?>
<div class="container-fluid">
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-bold text-success">Location</h5>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success btn-icon-split float-right" data-toggle="modal" data-target="#modal-lokasi-edit">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Edit Lokasi</span>
                    </button>
                </div>
            </div>
            <?php
            // $place = $place[0];
            // echo '<pre>';
            // print_r($edit);
            // echo '</pre>';
            // die;
            ?>
            <hr>
            <!-- <div id="container" style="width :100%; height:100%;" class="calendar-container mt-4 shadow p-4 rounded"></div> -->
            <div id="mapid"></div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-lokasi-edit" tabindex="-1" role="dialog" aria-labelledby="modalSpesialis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="titleModalSpesialis">Edit Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('index.php/admin/editLokasi'), ['id' => 'editLokasi']); ?>
                <input type="hidden" name="id" id="id-edit" value="<?= $edit->id_place ?>">
                <div class="form-group">
                    <?= form_label('Location Name', 'name', ['class' => 'h6']); ?>
                    <?= form_input(['type' => 'text', 'step' => '0,0000001',  'name' => 'name', 'id' => 'name', 'class' => 'form-control', 'value' => $edit->loc_name]);
                    ?>
                    <small id="edit-name" class="form-text text-danger ml-3"><?= form_error('name'); ?></small>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Right Top Latitude', 'latrt', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'latrt', 'id' => 'latrt', 'class' => 'form-control', 'value' => $edit->LatRT]);
                            ?>
                            <small id="edit-latrt" class="form-text text-danger ml-3"><?= form_error('latrt'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Right Bottom Latitude', 'latrb', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'latrb', 'id' => 'latrb', 'class' => 'form-control', 'value' => $edit->LatRB]);
                            ?>
                            <small id="edit-latrb" class="form-text text-danger ml-3"><?= form_error('latrb'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Left Top Latitude', 'latlt', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'latlt', 'id' => 'latlt', 'class' => 'form-control', 'value' => $edit->LatLT]);
                            ?>
                            <small id="edit-latlt" class="form-text text-danger ml-3"><?= form_error('latlt'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Left Bottom Latitude', 'latlb', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'latlb', 'id' => 'latlb', 'class' => 'form-control', 'value' => $edit->LatLB]);
                            ?>
                            <small id="edit-latlb" class="form-text text-danger ml-3"><?= form_error('latlb'); ?></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Right Top Longitude', 'longrt', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'longrt', 'id' => 'longrt', 'class' => 'form-control', 'value' => $edit->LongRT]);
                            ?>
                            <small id="edit-longrt" class="form-text text-danger ml-3"><?= form_error('longrt'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Right Bottom Longitude', 'longrb', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'longrb', 'id' => 'longrb', 'class' => 'form-control', 'value' => $edit->LongRB]);
                            ?>
                            <small id="edit-longrb" class="form-text text-danger ml-3"><?= form_error('longrb'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Left Top Longitude', 'longlt', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'longlt', 'id' => 'longlt', 'class' => 'form-control', 'value' => $edit->LongLT]);
                            ?>
                            <small id="edit-longlt" class="form-text text-danger ml-3"><?= form_error('longlt'); ?></small>
                        </div>
                        <div class="form-group">
                            <?= form_label('Left Bottom Longitude', 'longlb', ['class' => 'h6']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0,0000001',  'name' => 'longlb', 'id' => 'longlb', 'class' => 'form-control', 'value' => $edit->LongLB]);
                            ?>
                            <small id="edit-longlb" class="form-text text-danger ml-3"><?= form_error('longlb'); ?></small>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-success float-right" id="btnEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>





<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>

<script>
    $('#btnEdit').click(function(e) {
        e.preventDefault();
        $('#editLokasi').submit();
    });


    var center = [<?= $center[0] ?>, <?= $center[1] ?>];
    var mymap = L.map('mapid').setView(center, 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaGNhbGxkZWUiLCJhIjoiY2thZ2hiOG4yMDIzODJycXl3NmZsM2c4ZSJ9.4KHgacl8p3zdPNuUN4HF0w', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiaGNhbGxkZWUiLCJhIjoiY2thZ2hiOG4yMDIzODJycXl3NmZsM2c4ZSJ9.4KHgacl8p3zdPNuUN4HF0w'
    }).addTo(mymap);


    <?php foreach ($perawat as $data) { ?>
        var mark = L.marker([<?= $data->Lat ?>, <?= $data->Long ?>]).addTo(mymap);
        var dis = mark.getLatLng();
        // var dis = dis.distance([-3.2522, 116.2148])
        mark.bindPopup("Perawat <br>" +
            "Nama : " + " <?= $data->nama ?> <br>" +
            "No Telp : " + " <?= $data->no_telp ?> <br>" +
            "Jarak :" + (dis.distanceTo(center)).toFixed(0) / 1000 + "Km"
        );
    <?php } ?>

    <?php foreach ($dokter as $data) { ?>
        var mark = L.marker([<?= $data->Lat ?>, <?= $data->Long ?>]).addTo(mymap);
        var dis = mark.getLatLng();
        // var dis = dis.distance([-3.2522, 116.2148])
        mark.bindPopup("Dokter <br>" +
            "Nama : " + " <?= $data->nama ?> <br>" +
            "No Telp : " + " <?= $data->no_telp ?> <br>" +
            "Jarak :" + (dis.distanceTo(center)).toFixed(0) / 1000 + "Km"
        );
    <?php } ?>

    <?php foreach ($place as $data) { ?>
        var polygon = L.polygon([
                // RB
                [<?= $data->LatRB ?>, <?= $data->LongRB ?>],
                // LB
                [<?= $data->LatLB ?>, <?= $data->LongLB ?>],
                // LT
                [<?= $data->LatLT ?>, <?= $data->LongLT ?>],
                // RT
                [<?= $data->LatRT ?>, <?= $data->LongRT ?>],
            ])
            .addTo(mymap);
        polygon.bindPopup('<?= $data->loc_name ?>');
    <?php } ?>

    $('#editLokasi').submit(function(e) {
        $('#btnEdit').html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
        $('#btnEdit').addClass('disabled');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url("index.php/admin/editLokasi") ?>',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                if (data.status != 'error') {
                    console.log(data.status)
                    if (data.message == 'Lokasi tidak ada perubahan') {
                        toastr.error('Lokasi tidak ada perubahan');
                    } else {
                        $('#modal-lokasi').modal('hide');
                        window.location.href = '<?= base_url('index.php/admin/location') ?>';
                    }
                } else {
                    $('#edit_name').html(data.nama_err);
                    $('#edit-latrt').html(data.latrt_err);
                    $('#edit-latrb').html(data.latrb_err);
                    $('#edit-latlt').html(data.latlt_err);
                    $('#edit-latlb').html(data.latlb_err);
                    $('#edit-longrt').html(data.longrt_err);
                    $('#edit-longrb').html(data.longrb_err);
                    $('#edit-longlt').html(data.longlt_err);
                    $('#edit-longlb').html(data.longlb_err);
                    toastr.error('Tedapat kesalahan pada inputan anda');
                }
                $('#btnEdit').html('Simpan');
                $('#btnEdit').removeClass('disabled');
            }
        })
    });
</script>