<div class="container-fluid mt-3">
    <div class="text-center">
        <h4>Daftar Materi Kelas</h4>
    </div>

    <div class="col-sm-12 col-md-6">
        <label for="search">Cari materi <input type="text" class="form-control"></label>

    </div>

    <?php foreach ($materi as $m) : ?>
        <div class="card" style="background-color: #1b2021;">
            <div class="card-header" style="background-color: #080708;">
                <?= $m['materi_mapel'] ?>
            </div>

            <div class="card-body" style="background-color: #1b2021;">
                <p class="card-text">Guru pengampu : <?= $m['materi_guru']; ?></p>
                <a href="#" class="btn btn-primary">Pelajari mater</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>