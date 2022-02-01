<div class="container">
    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <form action="<?= base_url('guru/uploadMateri') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                <div class="form-group mr-3">
                    <label for="">Mata Pelajaran</label><br>
                    <select name="mapel" id="mapel" class="form-control-sm" style="background: rgba(0,0,0,0.6); color:white;">
                        <?php foreach ($mapel as $m) : ?>
                            <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" value="<?= $id_kelas ?>" name="id_kelas">
                <div class="form-group mr-3">
                    <label for="">Judul Materi</label><br>
                    <input type="text" class="form-control-sm" style="background: rgba(0,0,0,0.6); color:white;" name="judul_materi" id="judul_materi">
                </div>
                <div class="form-grop mb-3">
                    <label for="uploadMateri">Unggah File</label><br>
                    <input type="file" class="form-control-sm" accept=".docx, .pdf" name="upload" id="upload">
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea class="ckeditor" name="ckeditor" id="ckeditor" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary form-control">Kirim</button>

        </div>
    </form>
</div>