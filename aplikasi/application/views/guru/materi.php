<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
<?php
$user = $this->db->get_where('guru', ['nuptk' => $this->session->userdata['username']])->row_array();



?>
<div class="d-flex justify-content-center mb-3">
    <a href="<?= base_url('guru/kirimMateri/' . $id_kelas) ?>" type="button" class="btn btn-primary">Upload Materi</a>

</div>

<?php if (count($materi) == 0) { ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <small style="color: #bd3609 ;">Anda belum mengupload materi</small>
        </div>
    </div>
<?php } else { ?>
    <div class="container-fluid row">
        <?php foreach ($materi as $m) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    <a href="<?= base_url('guru/materiDetail/' . $m['id_materi']) ?>"><?= $m['judul_materi'] ?></a>
                                </div>
                                <div class="text-xs mb-0">Upload pada :</div>
                                <div class="text-xs mb-0 text-danger"><?= $m['date_create'] ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('guru/materiDetail/' . $m['id_materi']) ?>"><i style="color:darkcyan" class="fas fa-edit fa-2x"></i></a>
                                <a href="<?= base_url('guru/hapusMateri/' . $m['id_materi']) ?>" class="tombol-hapus"><i style="color:darkred" class="fas fa-trash fa-2x"></i></a>
                            </div>
                        </div>

                    </div>
                    <?php $comment = $this->db->get_where('materi_comment', ['id_materi' => $m['id_materi']])->num_rows(); ?>
                    <div class="card-footer d-flex justify-content-between text-xs text-dark h-2 mb-0">Komentar : <?= $comment ?>
                        <a href="<?= base_url('guru/tugas/' . $m['id_materi']) ?>" class="btn mb-0" style="background-color: sandybrown; color:seashell;">Beri tugas</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


<?php } ?>