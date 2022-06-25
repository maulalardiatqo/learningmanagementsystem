<div class="head mb-2" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Jadwal Mengajar</b></small>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col" style="overflow-x: auto;">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0" style="font-size: 12; size: 12px;">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Kelas</th>
                        <th>Jam masuk</th>
                        <th>Jam keluar</th>
                        <th>Mapel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jadwal as $j) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $j['hari']; ?></td>
                            <td><?= $j['tingkat'] . ' ' . $j['kelas_prodi'] . ' ' . $j['nama_kelas']; ?></td>
                            <td>Jam Ke - <?= $j['jam_masuk'] . ' Pukul : ' . explode("-", $j['pukul_masuk'])[0]; ?></td>
                            <td>Jam Ke - <?= $j['jam_keluar'] . ' Pukul : ' . explode("-", $j['pukul_keluar'])[1]; ?></td>
                            <td><?= $j['nama_mapel']; ?></td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>
    </div>
</div>