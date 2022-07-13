<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/dokter'); ?>">
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
        Dokter
    </div>



    <!-- pasien -->

    <?php if ($judul == 'Dokter') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link py-2" href="<?= base_url('index.php/dokter'); ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard</span></a>
        </li>

        <?php if ($judul == 'Kalender') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link py-2" href="<?= base_url('index.php/dokter/kalender'); ?>">
                <i class="far fa-fw fa-calendar-alt"></i>
                <span>Kalender</span></a>
            </li>

            <?php if ($judul == 'Tindakan') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link py-2" href="<?= base_url('index.php/dokter/tindakan'); ?>">
                    <i class="fas fa-fw fa-briefcase-medical"></i>
                    <span>Tindakan</span></a>
                </li>

                <?php if ($judul == 'Pasien') : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link py-2" href="<?= base_url('index.php/dokter/pasien'); ?>">
                        <i class="fas fa-fw fa-procedures"></i>
                        <span>Pasien</span></a>
                    </li>

                    <!-- resep -->
                    <?php if ($judul == 'Resep') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link py-2" href="<?= base_url('index.php/dokter/resep'); ?>">
                            <i class="fas fa-fw fa-capsules"></i>
                            <span>Resep</span></a>
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