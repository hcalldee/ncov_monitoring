<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/admin'); ?>">
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
    Admin
  </div>

  <!-- jadwal -->
  <?php if ($judul == 'Dashboard') : ?>
    <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link py-2" href="<?= base_url('index.php/admin'); ?>">
      <i class="fas fa-fw fa-chart-line"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- jadwal -->
    <?php if ($judul == 'Kalender') : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link py-2" href="<?= base_url('index.php/admin/kalender'); ?>">
        <i class="far fa-fw fa-calendar-alt"></i>
        <span>Kalender</span></a>
      </li>

      <!-- jadwal -->
      <?php if ($judul == 'Jadwal') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link py-2" href="<?= base_url('index.php/admin/jadwal'); ?>">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Jadwal</span></a>
        </li>

        <?php if ($judul == 'Location') : ?>
          <li class="nav-item active">
          <?php else : ?>
          <li class="nav-item">
          <?php endif; ?>
          <a class="nav-link py-2" href="<?= base_url('index.php/admin/location'); ?>">
            <i class="fas fa-fw fa-map"></i>
            <span>Location</span></a>
          </li>

          <!-- SPESIALIS -->
          <?php if ($judul == 'Spesialis') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link py-2" href="<?= base_url('index.php/admin/spesialis'); ?>">
              <i class="fas fa-fw fa-stethoscope"></i>
              <span>Spesialis</span></a>
            </li>

            <!-- TINDAKAN -->
            <?php if ($judul == 'Tindakan') : ?>
              <li class="nav-item active">
              <?php else : ?>
              <li class="nav-item">
              <?php endif; ?>
              <a class="nav-link py-2" href="<?= base_url('index.php/admin/tindakan'); ?>">
                <i class="fas fa-fw fa-briefcase-medical"></i>
                <span>Tindakan</span></a>
              </li>

              <!-- resep -->
              <?php if ($judul == 'Resep') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link py-2" href="<?= base_url('index.php/admin/resep'); ?>">
                  <i class="fas fa-fw fa-capsules"></i>
                  <span>Resep</span></a>
                </li>



                <?php if ($judul == 'Manajemen Dokter' || $judul == 'Manajemen Perawat' || $judul == 'Manajemen Pasien' || $judul == 'Manajemen Akun') : ?>
                  <li class="nav-item active">
                    <a class="nav-link py-2" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      <i class="fas fa-fw fa-chart-bar"></i>
                      <span>Manajemen User</span>
                    </a>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <?php else : ?>
                  <li class="nav-item">
                    <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="fas fa-fw fa-chart-bar"></i>
                      <span>Manajemen User</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <?php endif; ?>

                    <div class="bg-white py-2 collapse-inner rounded mt-2">
                      <h6 class="collapse-header">Sub menu</h6>

                      <!-- sub menu Akun -->
                      <?php if ($judul == 'Manajemen Akun') : ?>
                        <a class="collapse-item active" href="<?= base_url('index.php/admin/akun') ?>">Akun</a>
                      <?php else : ?>
                        <a class="collapse-item" href="<?= base_url('index.php/admin/akun') ?>">Akun</a>
                      <?php endif; ?>

                      <!-- sub menu dokter -->
                      <?php if ($judul == 'Manajemen Dokter') : ?>
                        <a class="collapse-item active" href="<?= base_url('index.php/admin/dokter') ?>">Dokter</a>
                      <?php else : ?>
                        <a class="collapse-item" href="<?= base_url('index.php/admin/dokter') ?>">Dokter</a>
                      <?php endif; ?>

                      <!-- sub menu dokter -->
                      <?php if ($judul == 'Manajemen Perawat') : ?>
                        <a class="collapse-item active" href="<?= base_url('index.php/admin/perawat') ?>">Perawat</a>
                      <?php else : ?>
                        <a class="collapse-item" href="<?= base_url('index.php/admin/perawat') ?>">Perawat</a>
                      <?php endif; ?>

                      <!-- sub menu dokter -->
                      <?php if ($judul == 'Manajemen Pasien') : ?>
                        <a class="collapse-item active" href="<?= base_url('index.php/admin/pasien') ?>">Pasien</a>
                      <?php else : ?>
                        <a class="collapse-item" href="<?= base_url('index.php/admin/pasien') ?>">Pasien</a>
                      <?php endif; ?>
                    </div>
                    </div>
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
                    <a class="nav-link py-2" href="<?= base_url('index.php/profile'); ?>">
                      <i class="fas fa-fw fa-user"></i>
                      <span>Profile</span></a>
                    </li>



                    <!-- Divider -->
                    <hr class="sidebar-divider mt-3">









                    <!-- Nav Item - Dashboard -->

                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                      <a class="nav-link py-2" href="<?= base_url('index.php/'); ?>auth/logout">
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
<!-- End of Sidebar -->