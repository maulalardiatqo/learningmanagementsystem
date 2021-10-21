<form action="" method="post">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas">
                        <?php foreach($kelas as $k) :?>
                        <option><?= $k['id_kelas']; ?></option>
                        <?php endforeach ;?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="guru">Guru</label>
                        <select class="form-control" id="guru" name="guru">
                        <?php foreach($guru as $g) : ?>
                        <option><?= $g['id_guru'];?></option>
                        <?php endforeach;?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="maple">Mapel</label>
                        <select class="form-control" id="mapel" name="mapel">
                        <?php foreach($mapel as $m) : ?>
                        <option><?= $m['id_mapel'];?></option>
                        <?php endforeach;?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <input class="form-control" type="time" id="jam" name="jam">-<input class="form-control" type="time" id="jam" name="jam">
                    </div>
                    <div class="form-group">
                        <label for="ehari">Hari</label>
                        <select class="form-control" id="hari" name="hari">
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jum'at</option>
                            <option>Sabtu</option>  
                    </div>

                </form>