<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small><b>Buat Soal Pilihan Ganda</b></small> <br>
        <?php foreach ($parent as $p) : ?>
            <small>Mapel : <?= $p['nama_mapel'] ?> </small><br>
        <?php endforeach; ?>
    </div>
</div>
<hr />
<div class="button d-flex justify-content-center">
    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#tambahSoal">
        <i class="fas fa-plus"></i> Tambah Soal
    </button>
</div>
<div class="container" style="font-size: 15px; color:aliceblue;">
    <?php $no = 1;
    foreach ($soal as $s) : ?>
        <div class="soal">
            <small><?= $no ?>. <?= $s['pertanyaan'] ?></small>
        </div>
        <div class="jawaban">
            <span value="<?= $s['jawaban_a'] ?>">A. <small><?= $s['jawaban_a'] ?></small></span>
        </div>
        <div class="jawaban">
            <span value="<?= $s['jawaban_b'] ?>">B. <small><?= $s['jawaban_b'] ?></small></span>
        </div>
        <div class="jawaban">
            <span value="<?= $s['jawaban_c'] ?>">C. <small><?= $s['jawaban_c'] ?></small></span>
        </div>
        <div class="jawaban">
            <span value="<?= $s['jawaban_d'] ?>">D. <small><?= $s['jawaban_d'] ?></small></span>
        </div>
        <div class="jawaban">
            <span value="<?= $s['jawaban_e'] ?>">E. <small><?= $s['jawaban_e'] ?></small></span>
        </div>
        <div class="opsi">
            <a href="<?= base_url('guru/buatSOal/' . $s['id_soal']) ?>"><i style="color:darkcyan;" class="fas fa-edit fa-2xs"></i></a>
            <a href="<?= base_url('guru/hapusSoal/' . $s['id_soal'] . '/' . $s['parent_id']) ?>" class="tombol-hapus"><i style="color:darkred" class="fas fa-trash fa-2xs"></i></a>
            <small>kunci jawaban : <?= $s['jawaban'] ?></small>
        </div>
        <?php $no++; ?>
    <?php endforeach ?>
</div>

<!-- Modal buat soal-->
<div class="modal fade" id="tambahSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('guru/tambahSoal') ?>">
                    <?php foreach ($parent as $ul) : ?>
                        <input type="hidden" name="parent_id" id="parent_id" value="<?= $ul['id_parent'] ?>">
                    <?php endforeach ?>

                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                        <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan" aria-describedby="emailHelp"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jawaban_a" class="form-label">Jawaban A</label>
                        <input type="text" class="form-control" id="jawaban_a" name="jawaban_a">
                    </div>
                    <div class="mb-3">
                        <label for="jawaban_b" class="form-label">Jawaban B</label>
                        <input type="text" class="form-control" id="jawaban_b" name="jawaban_b">
                    </div>
                    <div class="mb-3">
                        <label for="jawaban_c" class="form-label">Jawaban C</label>
                        <input type="text" class="form-control" id="jawaban_c" name="jawaban_c">
                    </div>
                    <div class="mb-3">
                        <label for="jawaban_d" class="form-label">Jawaban D</label>
                        <input type="text" class="form-control" id="jawaban_d" name="jawaban_d">
                    </div>
                    <div class="mb-3">
                        <label for="jawaban_e" class="form-label">Jawaban E</label>
                        <input type="text" class="form-control" id="jawaban_e" name="jawaban_e">
                    </div>
                    <div class="mb-3">
                        <label for="jawaban" class="form-label">Jawaban Benar</label>
                        <select class="form-control form-select-sm" aria-label=".form-select-sm example" name="jawaban" id="jawaban">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>