<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Soal</b></small>
    </div>
</div>

<div class="container mt-3">
    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
</div>
<div class="container" style="color: aliceblue;">
    <?php foreach ($soal as $g) : ?>
        <form action="<?= base_url('siswa/post_soal/') . $g['parent_id'] ?>" method="POST">
        <?php endforeach ?>
        <input type="hidden" name="mapel_id_parent" value="<?= $parent['mapel_id_parent'] ?>">
        <?php $no = 1;
        foreach ($soal as $s) : ?>
            <div class="soal">
                <small><?= $no ?>. <?= $s['pertanyaan'] ?></small>
            </div>

            <div class="jawaban">
                <input type="hidden" name="id_soal" id="id_soal" value="<?= $s['id_soal'] ?>">
                <input type="radio" value="A" name="jawaban-<?= $s['id_soal'] ?>"> <small>A. <?= $s['jawaban_a'] ?> <br></small>
                <input type="radio" value="B" name="jawaban-<?= $s['id_soal'] ?>"> <small>B. <?= $s['jawaban_b'] ?> <br></small>
                <input type="radio" value="C" name="jawaban-<?= $s['id_soal'] ?>"> <small>C. <?= $s['jawaban_c'] ?> <br></small>
                <input type="radio" value="D" name="jawaban-<?= $s['id_soal'] ?>"> <small>D. <?= $s['jawaban_d'] ?> <br></small>
                <input type="radio" value="E" name="jawaban-<?= $s['id_soal'] ?>"> <small>E. <?= $s['jawaban_e'] ?> <br></small>
            </div>

        <?php $no++;
        endforeach ?>
        <div class="button mt-3">
            <button class="btn btn-sm btn-success" type="submit">Kirim</button>
        </div>
        </form>

</div>