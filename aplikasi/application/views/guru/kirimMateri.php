<div class="container">
    <form action="<? base_url('guru/uploadMateri') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group mr-3">
                <label for="">Mata Pelajaran</label><br>
                <select name="" id="" class="form-control-sm">
                    <?php foreach ($mapel as $m) : ?>
                        <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mr-3">
                <label for="">Judul Materi</label><br>
                <input type="text" class="form-control-sm">
            </div>
            <div class="form-grop mb-3">
                <label for="uploadMateri">Unggah File</label><br>
                <input type="file" class="form-control-sm">
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