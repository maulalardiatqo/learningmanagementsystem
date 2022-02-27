<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5" style="background: rgba(0,0,0,0.6); color:white;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/'); ?>img/logo.png" alt="" width="100px"><br><br>
                                    <h1 class="h4 text-white-900 mb-4">SMK AL AMIRIYAH</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" value="<?= set_value('username'); ?>" aria-describedby="emailHelp" placeholder="siswa login dengan NIS" style="background: rgba(0,0,0,0.6); color:white;">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" style="background: rgba(0,0,0,0.6); color:white;">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a style="color: whitesmoke;" class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <!-- <div class="text-center">
                                <a style="color: whitesmoke;" class="small" href="<?= base_url('auth/registrasi') ?>">Buat Akun</a>
                            </div> -->
                                <div class="text-center">
                                    <a style="color: whitesmoke;" class="small" href="http://localhost/skripsi_lms/">Halaman Utama</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>