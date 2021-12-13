<div class="container-fluid mt-3">

    <!-- Page Heading -->
    <div class="text-center mb-3">
        <h5>Edit Profil</h5>
    </div>


    <?= form_open_multipart('siswa/profil') ?>
    <div class="d-flex justify-content-center">
        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/') . $user['foto']; ?> " width="100" height="100">
    </div>
    <div class="d-flex justify-content">
        <label for="ganti" style="color: #80ced6;">Ganti foto</label>
    </div>
    <div class="d-flex justify-content-center">
        <input type="file">
    </div>

    <div class="mb-1 row">
        <label for="staticEmail" class="col-sm-2 col-form-label" style="color: #80ced6;">NIS :</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $user['username']; ?>">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="staticEmail" class="col-sm-2 col-form-label" style="color: #80ced6;">Nama :</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $user['nama'] ?>">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="inputPassword" class="col-sm-2 col-form-label" style="color: #80ced6;">Password Sebelumnya :</label>
        <div class="col-sm">
            <input type="password" class="form-control" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label" style="color: #80ced6;">Password baru :</label>
        <div class="col-sm">
            <input type="password" class="form-control" id="inputPassword">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-success">Simpan Perubahan</button>
    </div>

    </form>

</div>