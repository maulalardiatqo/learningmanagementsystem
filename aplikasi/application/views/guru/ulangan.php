<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Ulangan</b></small>
    </div>
</div>
<div class="container-fluid mt-1 mb-3">
    <div class="button d-flex justify-content-center mt-2">
        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#buatSoal">
            <i class="fas fa-plus"></i> Buat Soal
        </button>
    </div>
    <div class="daftar mt-2">
        <small style="color:azure;"> <u> Daftar Soal : </u></small>
    </div>
    <div class="ulangan mt-1">
        <?php $no = 1;
        foreach ($ulangan as $ul) : ?>
            <div class="row">
                <div class="soal">
                    <a href="<?= base_url() ?>/guru/buatSoal/<?= $ul['id_parent'] ?>" style="color:aquamarine;"> <small><?= $no ?>. <?= $ul['type_ulangan'] ?> <?= $ul['judul_ulangan'] ?> <b>(<?= $ul['nama_mapel'] ?>)</b></small></a>
                </div>
                <div class="opsi pl-3">
                    <a href="<?= base_url('guru/buatSOal/' . $ul['id_parent']) ?>"><i style="color:darkcyan;" class="fas fa-edit fa-2xs"></i></a>
                    <a href="<?= base_url('guru/hapusParent/' . $ul['id_parent']) ?>" class="tombol-hapus"><i style="color:darkred" class="fas fa-trash fa-2xs"></i></a>
                </div>
                <?php $no++; ?>
            </div>
        <?php endforeach ?>

    </div>
</div>
<!-- Modal buat soal-->
<div class="modal fade" id="buatSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Template Soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('guru/buatParrent') ?>" method="POST">
                    <div class="input-group-sm mb-3">
                        <label for="type_ulangan" class="form-label"><small>Tipe Ulangan</small></label>
                        <select name="type_ulangan" id="type_ulangan" class="form-control">
                            <option value="PAT">PAT</option>
                            <option value="PAS">PAS</option>
                            <option value="UH">UH</option>
                        </select>
                    </div>
                    <div class="input-group-sm mb-3">
                        <label for="judul_ulangan" class="form-label"><small>Judul Ulangan</small></label>
                        <input type="text" class="form-control" id="judul_ulangan" name="judul_ulangan">
                    </div>
                    <div class="input-group-sm mb-3">
                        <label for="mapel_id_parent" class="form-label"><small>Mapel</small></label>
                        <select class="form-control form-select-sm" aria-label=".form-select-sm example" id="mapel_id_parent" name="mapel_id_parent">
                            <?php foreach ($mapel as $m) : ?>
                                <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group-sm mb-3">
                        <label for="waktu_pengerjaan" class="form-label"><small>Waktu Pengerjaan</small></label>
                        <input type="text" class="form-control" id="waktu_pengerjaan" name="waktu_pengerjaan" placeholder="Menit">
                    </div>
                    <div class="input-group-sm mb-3">
                        <label for="tanggal_pengerjaan" class="form-label"><small>Tanggal Pengerjaan</small></label>
                        <input type="date" class="form-control" id="tanggal_pengerjaan" name="tanggal_pengerjaan">
                    </div>
                    <div class="input-group-sm mb-3">
                        <label for="keterangan" class="form-label"><small>Keterangan</small></label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Buat</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>