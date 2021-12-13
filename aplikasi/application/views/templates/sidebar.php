<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2" href="index.html">
        <img src="<?= base_url('assets/') ?>img/kemenag.png" alt="" width="70px">

    </a>
    <span class="sidebar-brand d-flex align-items-center justify-content-center">SMK AL AMIRIYAH</span>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/profilSekolah') ?>">
            <i class="fas fa-id-badge"></i>
            <span>Profil Sekolah</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/guru') ?>">
            <i class="fas fa-user-md"></i>
            <span>Guru</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/siswa') ?>">
            <i class="fas fa-user"></i>
            <span>Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/jadwal') ?>">
            <i class="fas fa-user"></i>
            <span>Jadwal</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/mapel') ?>">
            <i class="fas fa-user"></i>
            <span>Mapel</span></a>
    </li>



    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/dataUser') ?>">
            <i class="fas fa-users"></i>
            <span>Data User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Program Studi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/tkj') ?>">TKJ</a>
                <a class="collapse-item" href="<?= base_url('admin/tkro') ?>">TKRO</a>
                <a class="collapse-item" href="<?= base_url('admin/apm') ?>">APM</a>
            </div>
        </div>
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