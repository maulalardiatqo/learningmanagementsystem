<div class="container-fluid mt-3 mb-3">
    <div class="col">
        <h6>Admin / Siswa</h6>
    </div>

    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <div class="row">
        <div class="col text-center">
            <h3>Data Siswa SMK AL AMIRIYAH</h3>
        </div>
    </div>
</div>
<div class="container mb-3">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i> Tambah Data Siswa</button>
            <a href="<?= base_url('assets/template_siswa.xlsx') ?>" download="" type="button" class="btn btn-warning"><i class="fas fa-download"></i> Download Template Siswa</a>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#upladExcel"><i class="fas fa-upload"></i> Unggah Template</button>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col" style="overflow-x: auto;">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0">

                <thead>
                    <tr>
                        <th><small><b>No</b></small></th>
                        <th><small><b>NIS</b></small></th>
                        <th><small><b>Nama</b></small></th>
                        <th><small><b>Alamat</b></small></th>
                        <th><small><b>Gender</b></small></th>
                        <th><small><b>Kontak</b></small></th>
                        <th><small><b>Kelas</b></small></th>
                        <th><small><b>Nama Ibu</b></small></th>
                        <th><small><b>Aksi</b></small></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $s) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><small><?= $s['nis']; ?></small></td>
                            <td><small><?= $s['nama_siswa']; ?></small></td>
                            <td><small><?= $s['alamat']; ?></small></td>
                            <td><small><?= $s['gender']; ?></small></td>
                            <td><small><?= $s['kontak']; ?></small></td>
                            <td><small><?= $s['tingkat'] . ' ' . $s['kelas_prodi'] . ' ' . $s['nama_kelas']; ?></small></td>
                            <td><small>
                                    <?= $s['nama_ibu']; ?> </small>
                            </td>
                            <td><small><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></small>
                                <a href="<?= base_url() ?>/admin/hapusSiswa/<?= $s['nis']; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahData"><i class="fas fa-plus"></i> Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahSiswa') ?>" method="POST">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input class="form-control" type="text" id="nis" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIK</label>
                        <input class="form-control" type="text" id="nik" name="nik">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" id="nama_siswa" name="nama_siswa">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" type="text" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="dropdown">
                        <select name="gender" id="gender" class="btn btn-secondary dropdown-toggle">
                            <option class="form-group" value="Laki-Laki">Laki-Laki</option>
                            <option class="form-group" value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input class="form-control" type="text" id="kontak" name="kontak">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                    </div>
                    <div class="dropdown">
                        <select name="prodi" id="prodi" class="btn btn-secondary dropdown-toggle">
                            <?php foreach ($prodi as $pr) : ?>
                                <option value="<?= $pr['nama_prodi'] ?>"><?= $pr['nama_prodi'] ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="prodi">Kelas</label>
                    </div>
                    <div class="dropdown">
                        <select name="kelas" id="kelas" class="btn btn-secondary dropdown-toggle">
                            <?php foreach ($kelas as $p) : ?>
                                <option value="<?= $p['id_kelas']; ?>"><?= $p['tingkat'] . ' ' . $p['kelas_prodi'] . ' ' . $p['nama_kelas']; ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="namaibu">Nama Ibu</label>
                        <input class="form-control" type="text" id="nama_ibu" name="nama_ibu">
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
<!-- Modal Uplad-->
<div class="modal fade" id="upladExcel" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahData"><i class="fas fa-plus"></i> Uplad Template Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/uploadSiswa') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="uploadSiswa">upload template yang sudah disediakan</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept=".xls, .xlsx" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
            </form>
        </div>
    </div>
</div>