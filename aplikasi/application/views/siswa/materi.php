<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Daftar Mata Pelajaran</b></small>
    </div>
</div>

<div class="container-fluid mt-3" style="font-size: 14px;">

    <div class="col-sm-12 col-md-6">
        <label for="search">Cari materi <input type="text" class="form-control"></label>

    </div>
    <?php foreach ($mapel as $m) : ?>
        <div class="card mb-3" style="background-color: #1b2021;">
            <div class="card-header" style="background-color: #080708; color: #80ced6;">
                <?= '<b>' . $m['nama_mapel'] . ' </b>' ?>
            </div>

            <div class="card-body" style="background-color: #1b2021;">
                <p class="card-text">Guru pengampu : <?= $m['guru_mapel']; ?></p>
                <p class="card-text">Jam Pelajaran / Minggu : <?= $m['jp_mapel']; ?></p>
                <a href="<?= base_url() ?>/siswa/pelajaran/<?= $m['id_mapel']; ?>" class="btn btn-primary">Masuk Pelajaran</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>