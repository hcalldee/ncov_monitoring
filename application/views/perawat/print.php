<!DOCTYPE html>
<html>

<head>
    <title><?= $judul ?></title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse:
                collapse;
        }
    </style>
</head>

<body onLoad="window.print()">
    <center>
        <h1>LAPORAN KEPERAWTAN</h1>
    </center><br>
    <table id="table-kriteria" class="table table-responsive table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th scope="col" width="5%" class="text-center">No</th>
                <th>Tanggal</th>
                <th class="col">Tindakan</th>
                <th scope="col">Pasien</th>
                <th scope="col">Perawat</th>
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
                        <td><?= $data->deskripsi ?></td>
                        <td><?= $data->pasien ?></td>
                        <td><?= $data->perawat ?></td>
                        <!-- <td align="center"> -->
                        <!-- <button class="btn btn-outline-warning btn-sm detail-tindakan" data-toggle="modal" data-target="#modal-detail-tindakan" data-id="<?= $data->id_tindakan ?>"><i class="fas fa-info"></i></button> -->
                        <!-- <a class="btn btn-outline-warning btn-sm" href="<?= base_url('perawat/editTindakan/') . $data->id_tindakan; ?>"><i class="fas fa-edit"></i></a> -->
                        <!-- </td> -->
                    </tr>
            <?php
                    $no++;
                }
            } ?>
        </tbody>
    </table>
    <br><br>
    <div style="float: right;">
        Kotabaru, <?php echo date('d-m-Y'); ?>
        <br><br><br><br><br>
        ............................
    </div>
</body>

</html>