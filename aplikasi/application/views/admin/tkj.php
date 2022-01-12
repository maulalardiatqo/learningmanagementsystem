<div class="container-fluid mt-3 mb-3">

    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <div class="row">
        <div class="col text-center">
            <h4>PRODI TEKNIK KOMPUTER JARINGAN</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5 ml-4">
        <div class="card">
            <div class="card-body">
                <form>

                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Ka. Prodi : <?= $prodi['kaprodi'] ?></label>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    $prodi = 'TKJ';
    $kelas = $this->db->get_where('kelas', ['kelas_prodi' => $prodi])->num_rows();
    $siswa = $this->db->get_where('siswa', ['prodi' => $prodi])->num_rows();
    ?>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <h5><i class="fa-solid fa-circle-info"></i><i class="fas fa-info-circle"></i> Info Prodi</h5>
                    <div>
                        <label for="">Jumlah Kelas : <?= $kelas ?> </label>
                    </div>
                    <div>
                        <label for="">Jumlah Siswa : <?= $siswa ?></label>

                    </div>
                    <div class="tambah_kelas"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i> Tambah Kelas</button></div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahData"><i class="fas fa-plus"></i> Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tkj') ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select name="hari" id="Hari" class="form-control">
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jum'at</option>
                            <option>Sabtu</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Baru</button>
                </div>
            </form>
        </div>
    </div>
</div>