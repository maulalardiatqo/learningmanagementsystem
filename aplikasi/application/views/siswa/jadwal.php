<div class="head" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Jadwal Pelajaran</b></small>
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