<div class="container-fluid">
    <div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
    <div class="row">
        <div class="col text-center">
            <h3>Mata Pelajaran</h3>
        </div>
    </div>
</div>
<?= form_error('hari', '<div class="alert alert-danger" role="alert">', '</div>') ?>
<?= $this->session->flashdata('message'); ?>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i> Tambah Mapel</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col" style="overflow-x: auto;">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mapel</th>
                        <th>kelas</th>
                        <th>Status Mapel</th>
                        <th>Guru Pengampu</th>
                        <th>Jumlah jam</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mapel as $u) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $u['nama_mapel']; ?></td>
                            <td><?= $u['kelas_mapel']; ?></td>
                            <td><?= $u['status_mapel']; ?></td>
                            <td><?= $u['nama_guru']; ?></td>
                            <td><?= $u['jp_mapel']; ?></td>
                            <td><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url() ?>/admin/hapusMapel/<?= $u['id_mapel'] ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
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
                <h5 class="modal-title" id="tambahData"><i class="fas fa-plus"></i> Tambah Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahMapel') ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="nama_mapel" class="col-sm-4 col-form-label">Nama Mapel</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_mapel" class="col-sm-4 col-form-label">Status Mapel</label>
                        <div class="col-sm-8">
                            <select name="status_mapel" id="status_mapel" class="form-control">
                                <option value="Produktif">Produktif</option>
                                <option value="Normatif">Normatif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jp_mapel" class="col-sm-4 col-form-label">Jumlah Jam Pelajaran</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="jp_mapel" id="jp_mapel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="guru_mapel" class="col-sm-4 col-form-label">Guru Pengampu</label>
                        <div class="col-sm-8">
                            <select name="guru_mapel" id="guru_mapel" class="form-control">
                                <?php foreach ($guru as $g) : ?>
                                    <option value="<?= $g['nuptk']; ?>"><?= $g['nama_guru']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kelas_mapel" class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <select name="kelas_mapel" id="kelas_mapel" class="form-control">
                                <?php foreach ($kelas as $k) : ?>
                                    <option value="<?= $k['id_kelas']; ?>"> <?= $k['tingkat']; ?> <?= $k['kelas_prodi']; ?> <?= $k['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
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