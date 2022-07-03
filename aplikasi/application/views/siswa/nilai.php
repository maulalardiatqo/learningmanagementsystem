<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Daftar Nilai</b></small>
    </div>
</div>
<div class="container" style="font-size: 12px;">
    <div class="accordion mt-5 sm" id="accordionExample">
        <?php foreach ($nilai as $n) : ?>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#id-<?= $n['id_mapel'] ?>" aria-expanded="true" aria-controls="collapseOne">
                            <?php echo $n['nama_mapel'] ?>
                        </button>
                    </h2>
                </div>

                <div id="id-<?= $n['id_mapel'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            foreach ($n['data'] as $dt) { ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $dt['judul_ulangan'] ?>
                                    <span class="badge badge-primary badge-pill"><?= $dt['nilai'] ?></span>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>