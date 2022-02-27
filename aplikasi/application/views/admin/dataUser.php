<div class="container-fluid mt-3 mb-3">
    <div class="col">
        <h6>Admin / Data User</h6>
    </div>
    <div class="row">
        <div class="col text-center">
            <h3>Data User</h3>
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
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Login Sebagai</th>
                        <th>Aktivasi</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $u) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $u['nama']; ?></td>
                            <td><img src="<?= base_url('assets/img/') . $u['foto']; ?>" alt="" width="50px"></td>
                            <td><?= $u['username']; ?></td>
                            <td><?php if ($u['role_id'] == 1) {
                                    echo ('Admin');
                                } elseif ($u['role_id'] == 2) {
                                    echo ('Guru');
                                } else {
                                    echo ('Siswa');
                                } ?></td>
                            <td class="text-center"><?php if ($u['is_active'] == 1) {
                                                        echo ('<i class="fas fa-check" style="color: green;"></i>');
                                                    } else {
                                                        echo ('<i class="fas fa-times" style="color: red;></i>');
                                                    }

                                                    ?></td>
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
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/guru'); ?>" method="post">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>