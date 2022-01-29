<div class="container-fluid mt-3 mb-3">

    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <div class="row">
        <div class="col text-center">
            <h3>PRODI TEKNIK KENDARAAN RINGAN - OTOMOTIF</h3>
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
    $prodi = 'TKR';
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
<div class="container mt-3">
    <div class="container d-flex justify-content-center">
        <u>
            <h5 style="color:darkcyan">Data Kelas Prodi TKR-O</h5>
        </u>
    </div>
    <div class="row">
        <div class="col" style="overflow-x: auto;">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tingkat</th>
                        <th>Prodi</th>
                        <th>Rombel</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    $prodi = 'TKR' ?>
                    <?php foreach ($tkr as $k) : ?>
                        <?php if ($k['kelas_prodi'] == $prodi) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $k['tingkat']; ?></td>
                                <td><?= $k['kelas_prodi']; ?></td>
                                <td><?= $k['nama_kelas']; ?></td>
                                <td><?= $k['nama_guru']; ?></td>
                                <td><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                    <a href="<?= base_url() ?>/admin/hapusKelas/<?= $k['id_kelas'] ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
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
            <form action="<?= base_url('admin/tkro') ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="tingkat">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="form-control">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas :</label>
                        <select name="nama_kelas" id="nama_kelas" class="form-control">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="wali_kelas">Wali Kelas :</label>
                        <select name="wali_kelas" id="wali_kelas" class="form-control">
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['nuptk'] ?>"><?= $g['nama_guru']; ?></option>
                            <?php endforeach ?>
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