<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col text-center">
            <h3>Jadwal Mengajar</h3>
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