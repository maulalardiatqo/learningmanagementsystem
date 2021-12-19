<div class="container-fluid mt-3">

    <!-- Page Heading -->
    <div class="text-center mb-3">
        <h5>Edit Profil</h5>
    </div>


    <?= form_open_multipart('siswa/profil') ?>
    <div class="d-flex justify-content-center">
        <div class="bungkus">
            <img class="img-profile" id="gambar" src="<?= base_url('assets/img/') . $user['foto']; ?> " height="130" width="130" style="clip-path: circle();">
        </div>

        <div class="d-flex justify-content form-group">
            <label for="edit_foto" style="position:relative;top: 78%; right: 100%; background-color: black; height: 35px; width: 35px; display:flex; align-items:center; justify-content: center;border-radius: 50%;"><span class="material-icons" style="color:floralwhite;">
                    camera_alt
                </span></label>
        </div>
        <div class="d-flex justify-content-center">
            <input type="file" style="display:none;visibility:none;" name="edit_foto" id="edit_foto">
        </div>

    </div>


    <div class="mb-1 row form-group">
        <label for="nid" class="col-sm-2 col-form-label" style="color: #80ced6;">NIS :</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="nis" name="nis" value="<?= $user['username']; ?>">
        </div>
    </div>
    <div class="mb-1 row form-group">
        <label for="nama" class="col-sm-2 col-form-label" style="color: #80ced6;">Nama :</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="<?= $user['nama'] ?>">
        </div>
    </div>
    <div class="mb-1 row form-group">
        <label for="inputPassword" class="col-sm-2 col-form-label" style="color: #80ced6;">Password Sebelumnya :</label>
        <div class="col-sm">
            <input type="password" class="form-control" id="passwordOld" name="passwordOld">
            <?= form_error('passwordOld', '<small class="text-danger pl-3">', '</small'); ?>
        </div>
    </div>
    <div class="mb-1 row form-group">
        <label for="inputPassword" class="col-sm-2 col-form-label" style="color: #80ced6;">Password baru :</label>
        <div class="col-sm">
            <input type="password" class="form-control" id="passwordNew" name="passwordNew">
            <?= form_error('passwordNew', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
    </div>
    <div class="mb-3 row form-group">
        <label for="inputPassword" class="col-sm-2 col-form-label" style="color: #80ced6;">Konfirmasi Password baru :</label>
        <div class="col-sm">
            <input type="password" class="form-control" id="passwordNewC" name="passwordNewC">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </div>

    </form>

</div>