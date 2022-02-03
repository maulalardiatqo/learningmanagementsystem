<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>

<div class="d-flex justify-content-center mb-3">Materi Pelajaran</div>

<?php if (count($materi) == 0) { ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <small style="color: #bd3609 ;">Belum ada materi</small>
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
                                    <a href="<?= base_url('siswa/materiDetail/' . $m['id_materi']) ?>"><?= $m['judul_materi'] ?></a>
                                </div>
                                <div class="text-xs mb-0">Upload pada :</div>
                                <div class="text-xs mb-0 text-danger"><?= $m['date_create'] ?></div>
                            </div>
                        </div>

                    </div>
                    <?php $comment = $this->db->get_where('materi_comment', ['id_materi' => $m['id_materi']])->num_rows(); ?>
                    <div class="card-footer text-xs text-dark h-2 mb-0"><i class="fas fa-comment"></i> Komentar : <?= $comment ?> </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


<?php } ?>