 <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background: rgba(0,0,0,0.6); color:white;">
            <div class="card-body p-0" >
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="<?= base_url('assets/');?>img/kemenag.png" alt="" width="100px"><br><br>
                                <h1 class="h4 text-white-900 mb-4">MTs Ihsaniyah</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/registrasi')?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" 
                                        placeholder="Nama Lengkap" style="background: rgba(0,0,0,0.6); color:white;" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>
                               
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" 
                                        placeholder="Email / NIS" style="background: rgba(0,0,0,0.6); color:white;" name="username" id="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>
                                <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                            placeholder="Password" style="background: rgba(0,0,0,0.6); color:white;" name="password1" id="password1">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small'); ?>
                                </div>
                                <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                            id="password2" placeholder="Ulangi Password" style="background: rgba(0,0,0,0.6); color:white;" name="password2">
                                </div>
                              
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a style="color: whitesmoke;" class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a style="color: whitesmoke;" class="small" href="<?= base_url('auth')?>">jika sudah punya akun silhkan Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>