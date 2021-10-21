<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col text-center">
            <h3>Jadwal Mengajar</h3>
        </div>
    </div>
</div>

<?php
    
    $query = "SELECT * FROM jadwal
            LEFT JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
            LEFT JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
            LEFT JOIN guru ON jadwal.id_guru = guru.id_guru
            WHERE jadwal.id_guru = ".$this->session->userdata['username'];
    $jadwal = $this->db->query($query)->result_array();

?>
    <div class="container">
    <div class="row">
        <div class="col" style="overflow-x: auto;">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0">
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Kelas</th>
                        <th>Jam</th>
                        <th>Mapel</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
               <?php foreach($jadwal as $j) :?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $j['hari']; ?></td>
                        <td><?= $j['nama_kelas']; ?></td>
                        <td><?= $j['jam']; ?></td>
                        <td><?= $j['nama_mapel']; ?></td>
   
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
                   
            </table>
        </div>
    </div>
</div>