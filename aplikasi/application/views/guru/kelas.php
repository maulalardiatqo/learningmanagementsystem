<div class="head mb-2" style="color:aliceblue; background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,111,121,1) 35%, rgba(0,212,255,1) 100%); padding-bottom:8px; padding-top:8px;">
    <div class="container" style="padding-left:10px; font-size: 14px;">
        <small style="color:aliceblue;"><b>Daftar Kelas</b></small>
    </div>
</div>
<div id="flash-data" data-typealert="<?= $this->session->flashData('flashtype'); ?>" data-flashdata="<?= $this->session->flashData('flash'); ?>"></div>
<div class="main">
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col" style="overflow-x: auto;">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0">

                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $guru = $this->db->get_where('guru', ['nuptk' => $this->session->userdata['username']])->row_array();
                        ?>
                        <?php foreach ($cetak as $j) : ?>
                            <?php if ($j['nuptk_guru'] == $guru['nuptk']) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><b><a style="color: cyan;" href="<?= base_url() ?>/guru/materi/<?= $j['id_kelas'] ?>"><?= $j['tingkat'] . ' ' . $j['kelas_prodi'] . ' ' . $j['nama_kelas'] ?></a></b></td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>