<div class="container-fluid mt-3">
    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <!-- Page Heading -->
    <div class="text-center mb-5">
        <h5>Ubah Password</h5>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <form action="<?= base_url('siswa/ubahpw'); ?>" method="POST">
                <div class="form-group">
                    <label for="pwold" style="color: #80ced6;">Password Lama :</label>
                    <input type="password" class="form-control form-control-user" name="pwold">
                    <?= form_error('pwold', '<small class="text-danger pl-3">', '</small'); ?>
                </div>
                <div class="form-group" style="color: #80ced6;">
                    <label for="pwnew">Password Baru :</label>
                    <input type="password" class="form-control form-control-user" name="pwnew">
                    <?= form_error('pwnew', '<small class="text-danger pl-3">', '</small'); ?>
                </div>
                <div class="form-group" style="color: #80ced6;">
                    <label for="conpwnew">Konfirmasi Password :</label>
                    <input type="password" name="conpwnew" class="form-control form-control-user">
                    <?= form_error('conpwnew', '<small class="text-danger pl-3">', '</small'); ?>
                </div>
                <div class="d-flex justify-content-center"><button type="submit" class="btn btn-success">Simpan Perubahan</button></div>
            </form>


        </div>
    </div>

</div>