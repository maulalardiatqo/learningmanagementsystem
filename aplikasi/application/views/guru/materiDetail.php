<div class="container">
    <?php foreach ($materi as $m) : ?>
        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between">
                <div class="text-md" style="color: darkcyan;"><b> <?= $m['nama_mapel'] ?></b>
                </div>
                <div>
                    <i class="fas fa-folder"></i>
                </div>

            </div>
            <div class="card-body">
                <h6 class="card-title text-center"><b><?= $m['judul_materi'] ?></b></h6>
                <p class="card-text"><?= $m['isi_materi'] ?></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    <?php endforeach ?>
    <?php if ($comment) { ?>
        <?php foreach ($comment as $m) : ?>
            <div class="card mb-2">
                <div class="header d-flex content-between" style="height: 20px; background-color:gainsboro; color:maroon; font-size:small;">
                    <p class="ml-2 mt-0"><small><?= $m['nama'] ?></small></p>
                    <p class="ml-2 mt-0"><small>at-<?= $m['date_create'] ?></small></p>
                </div>
                <div class="card-body">
                    <div class="text-xs mb-0"><?= $m['comment'] ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Komentari.." aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></span>
        </div>
    </div>
</div>