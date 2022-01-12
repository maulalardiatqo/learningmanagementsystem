<div class="container-fluid mt-3">
    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
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
    <div class="d-flex justify-content-center mt-3" id="edit_pass">
        <a href="<?= base_url('siswa/ubahpw'); ?>" class="btn btn-dark btn-sm">Ubah Password</a>
    </div>


    <div class="form-group">
        <label for="nid" class="col-sm-2 col-form-label" style="color: #80ced6;">NIS :</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="nis" name="nis" value="<?= $user['username']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="nama" class="col-sm-2 col-form-label" style="color: #80ced6;">Nama :</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="<?= $user['nama'] ?>">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </div>

    </form>

</div>