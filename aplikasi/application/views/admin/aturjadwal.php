<div class="container">
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  Tambah Jadwal
</button>
<div class="row" id="containerJadwal">

</div>
    
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
            <input type="hidden" name="kelas" value="<?= $id_kelas?>" id="">
            <div class="form-group">
                <label for="hari">Hari</label>
                <select class="form-control" name="hari" id="" >
                <?php 
                $hari=array(
                    "Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"
                );
                foreach($hari as $h){?>
                    <option value="<?= $h?>"><?= $h?></option>
                <?php } ?>
                
                </select>
                
            </div>
            <div class="form-group">
                <label for="hari">Mapel</label>
                <select class="form-control" name="mapel" id="">
                <?php 
            
                foreach($mapel as $m){?>
                    <option value="<?= $m['id_mapel'];?>"><?= $m['nama_mapel']?></option>
                <?php } ?>
                
                </select>
                
            </div>
            <div class="form-group">
                    
                <label for="hari">Guru</label>
                <select class="form-control" name="guru" id="">
                <?php 
            
                foreach($guru as $g){?>
                    <option value="<?= $g['id_guru'];?>"><?= $g['nama_guru']?></option>
                <?php } ?>
                </select>   
            </div>
            <div class="form-group">
                <label for="hari">Waktu</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="time" class="form-control" name="startdate"/>
                    </div>
                    <div class="col-md-2 text-center" >
                        s/d
                    </div>
                    <div class="col-md-5">
                        <input type="time" class="form-control" name="enddate"/>
                    </div>
                </div>
           </div>       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveJadwal">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>