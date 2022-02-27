<div class="container-fluid">
  <div class="col">
    <h6>Admin / Guru</h6>
  </div>

  <div id="flash-data" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
  <div class="row">
    <div class="col text-center">
      <h3>Data Guru SMK Al Amiriyah</h3>
    </div>
  </div>
</div>
<div class="container mt-3 mb-3">
  <div class="row">
    <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus"></i> Tambah Data Guru</button>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col" style="overflow-x: auto;">

      <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">NUPTK</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Gender</th>
            <th scope="col" class="text-center">Jadwal Mengajar</th>
            <th scope="col" colspan="2" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($guru as $g) : ?>
            <tr>
              <th scope="row" class="text-center"><?= $i; ?></th>
              <td class="text-center"><?= $g['nuptk']; ?></td>
              <td class="text-center"><?= $g['nama_guru']; ?></td>
              <td class="text-center"><?= $g['gender']; ?></td>
              <td class="text-center"><button class="btn btn-info">Lihat Jadwal Mengajar</button></td>
              <td class="text-center">
                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url() ?>/admin/hapusGuru/<?= $g['nuptk']; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
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
        <form action="<?= base_url('admin/tambahGuru'); ?>" method="post">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NUPTK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nuptk" id="nuptk">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_guru" id="nama_guru">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
              <select name="gender" id="gender" class="form-control">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="tombol">Tambah Guru</button>
      </div>
      </form>
    </div>
  </div>
</div>