<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <?php foreach ($nilai as $n) : ?>
            <?php
            if ($n > 0) { ?>
                <small style="color:aliceblue;"><b>Detail Nilai <?= $n['nama_mapel'] ?></b></small>
            <?php } else { ?>
                <small style="color:aliceblue;"><b>Belum ada nilai untuk mapel ini?></b></small>
            <?php } ?>

        <?php endforeach; ?>
    </div>
</div>
<div class="daftar">
    <?php $no = 1;
    foreach ($nilai as $n) : ?>
        <table class="table table-sm" style="color: aliceblue;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $n['nama_siswa']; ?></td>
                    <td><?= $n['nilai']; ?></td>
                </tr>
            </tbody>
        </table>

    <?php $no++;
    endforeach; ?>
</div>