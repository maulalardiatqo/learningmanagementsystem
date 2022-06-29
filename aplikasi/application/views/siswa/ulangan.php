<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>List Ulangan</b></small>
    </div>
</div>

<div class="container mt-3">
    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
</div>
<div class="container">
    <?php $no = 1;
    foreach ($ulangan as $ul) : ?>
        <div class="soal_ulangan">
            <a href="<?= base_url() ?>/siswa/soal/<?= $ul['id_parent'] ?>" style="color:aquamarine;"> <small><?= $no ?>. <?= $ul['type_ulangan'] ?> <?= $ul['judul_ulangan'] ?> <b>(<?= $ul['nama_mapel'] ?>)</b></small></a>
            <?php $no++; ?>
        </div>
        <div class="waktu" style="color:aquamarine;">
            <small><?= $ul['tanggal_pengerjaan'] ?> <span style="color: red;"><?= $ul['waktu_pengerjaan'] ?> Menit</span></small>
        </div>
    <?php endforeach ?>
</div>