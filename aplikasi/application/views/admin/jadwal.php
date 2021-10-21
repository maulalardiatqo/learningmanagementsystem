

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <h3>Jadwal Mengajar</h3>
        </div>
    </div>
</div>
<?= form_error('hari', '<div class="alert alert-danger" role="alert">', '</div>')?>
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
    <?php foreach ($kelas as $k) { ?>
        <div class="col-md-4">
            <a href="<?php echo base_url()?>admin/atur_jadwal/<?php echo $k['id_kelas']?>" class="card">
                <div class="card-body">
                    <h1><?= $k['nama_kelas']?></h1>                
                </div>
            </a>
        </div>
    <?php } ?>
        
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
                        <?php foreach($kelas as $k) :?>
                        <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                        <?php endforeach ;?>
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
                        <?php foreach($guru as $g) :?>
                        <option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']; ?></option>
                        <?php endforeach ;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="maple">Mapel</label>
                        <select class="form-control" id="mapel" name="mapel">
                        <?php foreach($mapel as $m) : ?>
                        <option value="<?= $m['id_mapel'];?>"><?= $m['nama_mapel'];?></option>
                        <?php endforeach;?>
                        </select> 
                    </div>
                    <div class="form-group">
                    <label for="jam">Jam</label>
                        <input class="form-control" type="text" id="jam" name="jam" placeholder="07.00-07.30">
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