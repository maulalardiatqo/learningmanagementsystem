<div class="container-fluid mt-3">
    <div class="text-center">
        <h4>Daftar Materi Kelas</h4>
    </div>

    <div class="col-sm-12 col-md-6">
        <label for="search">Cari materi <input type="text" class="form-control"></label>

    </div>

    <?php foreach ($mapel as $m) : ?>
        <div class="card mb-3" style="background-color: #1b2021;">
            <div class="card-header" style="background-color: #080708; color: #80ced6;">
                <?= '<b>' . $m['nama_mapel'] . ' ' . '|' . ' ' . $m['kelas_mapel'] . '</b>' ?>
            </div>

            <div class="card-body" style="background-color: #1b2021;">
                <p class="card-text">Guru pengampu : <?= $m['guru_mapel']; ?></p>
                <p class="card-text">Jam Pelajaran / Minggu : <?= $m['jp_mapel']; ?></p>
                <a href="<?= base_url('sisiwa/pelajaran'); ?>" class="btn btn-primary">Masuk Pelajaran</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>