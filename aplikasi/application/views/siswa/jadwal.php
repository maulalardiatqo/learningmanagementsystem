<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col text-center">
            <h6>Jadwal Mata Pelajaran</h6>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <?php
            $day = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

            foreach ($day as $j) : ?>


                <div class="card mt-3">
                    <div class="card-header bg-success">
                        <h6 style="color: aliceblue;"> <b><?= $j; ?></b> </h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mapel</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jadwal as $jd) : ?>
                                    <?php if ($jd['hari'] == $j) { ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $jd['nama_mapel'] ?></td>
                                            <td><?= $jd['jam_masuk'] ?></td>
                                            <td><?= $jd['nama_guru'] ?></td>
                                        </tr>
                                    <?php  } ?>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
</div>