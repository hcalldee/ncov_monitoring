<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/perawat'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-chart-line"></i>
    </div>
    <div class="sidebar-brand-text mx-3">UASGIS</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Query Menu -->


  <!-- Looping menu -->
  <div class="sidebar-heading text-white mb-1">
    Perawat
  </div>



  <!-- jadwal -->
  <?php if ($judul == 'Kalender') : ?>
    <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link py-2" id="kalender" href="<?= base_url('index.php/perawat/kalender'); ?>">
      <i class="far fa-fw fa-calendar-alt"></i>
      <span>Kalender</span></a>
    </li>

    <!-- TINDAKAN -->
    <?php if ($judul == 'Tindakan') : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link py-2" id="tindakan" href="<?= base_url('index.php/perawat/tindakan'); ?>">
        <i class="fas fa-fw fa-briefcase-medical"></i>
        <span>Tindakan</span></a>
      </li>

      <!-- TINDAKAN -->
      <?php if ($judul == 'Pasien') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link py-2" id="pasien" href="<?= base_url('index.php/perawat/pasien'); ?>">
          <i class="fas fa-fw fa-procedures"></i>
          <span>Pasien</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">


        <div class="sidebar-heading text-white mb-1">
          User
        </div>
        <!-- HOME -->
        <?php if ($judul == 'Profile') : ?>
          <li class="nav-item active">
          <?php else : ?>
          <li class="nav-item">
          <?php endif; ?>
          <a class="nav-link py-2" id="profile" href="<?= base_url('index.php/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
          </li>



          <!-- Divider -->
          <hr class="sidebar-divider mt-3">


          <!-- Nav Item - Dashboard -->

          <!-- Nav Item - Charts -->
          <li class="nav-item">
            <a class="nav-link py-2" id="logout" href="<?= base_url('index.php/'); ?>auth/logout">
              <i class="fas fa-fw fa-sign-out-alt"></i>
              <span>Logout</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

</ul>
<div id="mapid" hiddden></div>
<?php
// echo '<pre>';
// print_r($mark);
// echo '</pre>';
?>
<!-- End of Sidebar -->
<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>
<script>
  $('#tindakan').click(function(e) {
    e.preventDefault();
    var mark = [<?= $mark->Lat ?>, <?= $mark->Long ?>]
    //[-3.25261, 116.21478]
    var point = L.marker(mark)
    //.addTo(mymap);
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
      //.addTo(mymap);
      // polygon.bindPopup('<?= $data->loc_name ?>');
    <?php } ?>
    if (isMarkerInsidePolygon(point, polygon)) {
      $.ajax({
        url: '<?= base_url("index.php/perawat/check") ?>',
        type: 'POST',
        data: {
          stat: true
        },
        success: function() {
          window.location.href = '<?= base_url('index.php/perawat/tindakan') ?>';
        }
      })
    } else {
      Swal.fire({
        icon: 'error',
        text: 'Silahkan Check-In Kekantor Untuk Mengisi Tindakan',
        confirmButtonColor: '#1cc88a'
      })
    }
  });

  function isMarkerInsidePolygon(marker, poly) {
    var inside = false;
    var x = marker.getLatLng().lat,
      y = marker.getLatLng().lng;
    for (var ii = 0; ii < poly.getLatLngs().length; ii++) {
      var polyPoints = poly.getLatLngs()[ii];
      for (var i = 0, j = polyPoints.length - 1; i < polyPoints.length; j = i++) {
        var xi = polyPoints[i].lat,
          yi = polyPoints[i].lng;
        var xj = polyPoints[j].lat,
          yj = polyPoints[j].lng;

        var intersect = ((yi > y) != (yj > y)) &&
          (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
        if (intersect) inside = !inside;
      }
    }
    return inside;
  }
</script>