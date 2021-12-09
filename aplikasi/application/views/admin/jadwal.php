<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <h3>Jadwal Mengajar</h3>
        </div>
    </div>
</div>
<?= form_error('hari', '<div class="alert alert-danger" role="alert">', '</div>') ?>
<?= $this->session->flashdata('message'); ?>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i> Atur jadwal Mengajar</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- <?php foreach ($kelas as $k) { ?>
            <div class="col-md-4">
                <a href="<?php echo base_url() ?>admin/atur_jadwal/<?php echo $k['id_kelas'] ?>" class="card">
                    <div class="card-body">
                        <h1><?= $k['tingkat']; ?> <?= $k['kelas_prodi']; ?> <?= $k['nama_kelas']; ?></h1>
                    </div>
                </a>
            </div>
        <?php } ?> -->
        <div class="col" style="overflow-x: auto;">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                        <th>Hari</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jadwal as $u) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $u['tingkat'] . ' ' . $u['kelas_prodi'] . ' ' . $u['nama_kelas']; ?></td>
                            <td><?= $u['nama_guru']; ?></td>
                            <td><?= $u['nama_mapel']; ?></td>
                            <td><?= $u['hari']; ?></td>
                            <td>Jam Ke - <?= $u['jam_masuk'] . ' Pukul : ' . explode("-", $u['pukul_masuk'])[0]; ?></td>
                            <td>Jam Ke - <?= $u['jam_keluar'] . ' Pukul : ' . explode("-", $u['pukul_keluar'])[1]; ?></td>

                            <td><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
                <h5 class="modal-title" id="tambahData"><i class="fas fa-plus"></i> Tambah Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/jadwal') ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas">
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k['id_kelas']; ?>"> <?= $k['tingkat']; ?> <?= $k['kelas_prodi']; ?> <?= $k['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
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

                    <div class="form-group">
                        <label for="guru">Guru</label>
                        <select class="form-control" id="guru" name="guru">
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="maple">Mapel</label>
                        <select class="form-control" id="mapel" name="mapel">
                            <?php foreach ($mapel as $m) : ?>
                                <option value="<?= $m['id_mapel']; ?>"><?= $m['nama_mapel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam masuk</label>
                        <select class="form-control" name="jam_masuk" id="jam_masuk">
                            <?php foreach ($jammengajar as $j) : ?>
                                <option value="<?= $j['id_jam']; ?>"><?= $j['jam_ke'] . '. (' . $j['pukul']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam keluar</label>
                        <select class="form-control" name="jam_keluar" id="jam_keluar">
                            <?php foreach ($jammengajar as $j) : ?>
                                <option value="<?= $j['id_jam']; ?>"><?= $j['jam_ke'] . '. (' . $j['pukul']; ?>)</option>
                            <?php endforeach; ?>
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