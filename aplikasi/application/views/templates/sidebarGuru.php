<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2" href="<?= base_url('guru') ?>">
        <img src="<?= base_url('assets/') ?>img/kemenag.png" alt="" width="70px">

    </a>
    <span class="sidebar-brand d-flex align-items-center justify-content-center">MTs Ihsaniyah</span>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/jadwal') ?>">
            <i class="fas fa-user"></i>
            <span>Jadwal Mengajar</span></a>
    </li>




    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/kelas') ?>">
            <i class="fas fa-users"></i>
            <span>Kelas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/tugas') ?>">
            <i class="fas fa-calendar-check"></i>
            <span>Tugas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/ujian') ?>">
            <i class="fas fa-calendar-check"></i>
            <span>Ujian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
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