<div class="container mt-3">
    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <?php foreach ($materi as $m) : ?>

        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between">
                <div class="text-md d-flex" style="color: darkcyan;">
                    <b> <?= $m['nama_mapel'] ?> |</b>
                    <p style="color: lightseagreen;"> | <?= $m['nama_guru'] ?></p>
                </div>
                <div class="">
                    <i class="fas fa-list-alt"></i>
                    <i class="fas fa-users"></i>
                    <i class="fas fa-folder"></i>
                </div>

            </div>
            <div class="card-body">
                <h6 class="card-title text-center"><b><?= $m['judul_materi'] ?></b></h6>
                <p class="card-text"><?= $m['isi_materi'] ?></p>
                <button onclick="scrolldown();" class="btn btn-dark btn-sm text-white">Beri Komentar</button>
            </div>
        </div>
        <div class="card">
            <div class="d-flex justify-content-around text-xs">
                <?php $tugas = $this->db->get_where('tugas', ['id_materi' => $m['id_materi']])->num_rows();

                ?>

                <a href="" class="btn bg-transparent"><i class="fas fa-list-alt"></i> Tugas <?php if ($tugas) { ?> <span class="badge badge-danger badge-counter"><?= $tugas ?></span><?php } ?></a>

                <a href="" class="btn bg-transparent"><i class="fas fa-users"></i> Anggota</a>
                <a href="" class="btn bg-transparent"><i class="fas fa-folder"></i> File Materi
                    <?php if ($m['upload_file']) { ?> <span class="badge badge-danger badge-counter"></span> <?php } ?></a>
            </div>
        </div>
    <?php endforeach ?>
    <div class="card d-flex align-items-start">
        <div class="card body text-xs">
            <button class="btn bg-transparent btn-sm"> <i class="fas fa-user-friends"></i> Komentar</button>
        </div>
    </div>
    <?php if ($comment) { ?>

        <?php foreach ($comment as $m) : ?>
            <div class="card mb-2">
                <div class="header d-flex content-between" style="height: 20px; background-color:gainsboro; color:maroon; font-size:small;">
                    <p class="ml-2 mt-0" style="color:green;"><small><b><?= $m['nama'] ?></b></small></p>
                    <p class="ml-2 mt-0"><small>pada-<?= $m['date_create'] ?></small></p>
                </div>
                <div class="card-body">
                    <div class="text-xs mb-0"><?= $m['comment'] ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>

    <form action="<?= base_url('guru/komentar') ?>" method="POST">
        <div class="input-group mb-3">
            <?php foreach ($comment as $c) : ?>
                <input type="hidden" value="<?= $c['id_materi'] ?>" name="id_materi">
                <input type="hidden" value="<?= $c['kelas_id'] ?>" name="id_kelas">

            <?php endforeach; ?>
            <input type="text" id="input" class="form-control" placeholder="Komentari..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="comment" id="comment">
            <div class="input-group-append">
                <button type="submit" class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>

    </form>

</div>
<script>
    function scrolldown() {
        window.scrollTo(0, document.body.scrollHeight)
        document.getElementById("input").focus()
    }
</script>