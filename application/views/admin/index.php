<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">

    <h4 class="font-weight-bold text-gray-600">Dashboard</h4>
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card shadow mb-4 border-left-success">
                <!-- Card Header - Accordion -->
                <a href="#collapseGrafik" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseGrafik">
                    <h6 class="m-0 font-weight-bold text-success" style="text-decoration-color: aqua">Grafik Pasien</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseGrafik" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <div>
                                    <canvas id="canvas" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow ">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-success" style="color: #1cc88a">Detail</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample" style="">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #1cc88a">Jumlah Pasien</div>
                                <div class="text-xs font-weight-bold text-gray-600 text-uppercase mb-1"><?= $jumlah ?> Pasien</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-400"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #1cc88a">PDP</div>
                                <div class="text-xs font-weight-bold text-gray-600 text-uppercase mb-1"><?= $pdp ?> Pasien</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-shield fa-2x text-gray-400"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #1cc88a">ODP</div>
                                <div class="text-xs font-weight-bold text-gray-600 text-uppercase mb-1"><?= $odp ?> Pasien</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tag fa-2x text-gray-400"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #1cc88a">Positif</div>
                                <div class="text-xs font-weight-bold text-gray-600 text-uppercase mb-1"><?= $positif ?> Pasien</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-plus fa-2x text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-success">Petugas jaga</h6>
                </div>
            </div>
            <hr>
            <table id="table-kriteria" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th scope="col">Nama Petugas</th>
                        <th>No Telp</th>
                        <th class="text-center">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($petugas as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->no_telp ?></td>
                            <td><?= $data->alamat ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table-kriteria').DataTable();
    });

    $('.confirm-hapus').on('click', function() {
        Swal.fire({
            title: 'Hapus ' + $(this).data('nama') + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4e73df',
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
            url: '<?= base_url() ?>kriteria/hapus/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('kriteria') ?>';
            }
        });
    }

    $.ajax({
        url: '<?= base_url('index.php/landing/getGrafik') ?>',
        method: 'post',
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            var status = [];
            var total = [];

            Object.keys(data).forEach(function(k) {
                status.push(k.toUpperCase());
                total.push(parseInt(data[k]));
            });

            // data.forEach(function(obj) {
            //     penyakit.push(obj.penyakit);
            //     total.push(parseInt(obj.total));
            // });

            var barChartData = {
                labels: status,
                datasets: [{
                    fillColor: "#6f60fb",
                    strokeColor: "#6f60fb",
                    data: total
                }]
            }

            var index = 0;
            var ctx = document.getElementById("canvas").getContext("2d");
            var barChartDemo = new Chart(ctx).Bar(barChartData, {
                responsive: true,
                barValueSpacing: 40
            });


        }
    });
</script>