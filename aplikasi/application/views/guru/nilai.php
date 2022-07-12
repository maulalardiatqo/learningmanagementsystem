<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Daftar Nilai</b></small>
    </div>
</div>
<div class="container" style="font-size: 12px;">
    <div class="accordion mt-2 sm" id="accordionExample">
        <?php $no = 1;
        foreach ($nilai as $n) : ?>
            <div class="mapel">
                <a href="<?= base_url('guru/detailNilai/') ?><?= $n['id_mapel'] ?>" style="color:aliceblue;"><?= $no ?>.<?= $n['nama_mapel'] ?> <?= $n['tingkat'] ?> <?= $n['kelas_prodi'] ?> <?= $n['nama_kelas'] ?></a>
            </div>

        <?php $no++;
        endforeach; ?>
    </div>
</div>