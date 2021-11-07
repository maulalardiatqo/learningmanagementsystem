<div class="container-fluid mt-3 mb-3">

    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <div class="row">
        <div class="col text-center">
            <h3>PRODI SMK AL AMIRIYAH</h3>
        </div>
    </div>
</div>


<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/tkj') ?>">TKJ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/tkr') ?>">TKR-O</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/apm') ?>">APM</a>
            </li>

        </ul>
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>