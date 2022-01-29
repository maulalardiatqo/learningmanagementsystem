<div class="container">
    <div class="d-flex justify-content-center mb-3">
        <b style="color: aquamarine;">Daftar kelas ajar</b>
    </div>
</div>
<div class="main">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col" style="overflow-x: auto;">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" collapse="0">

                    <thead>
                        <tr>
                            <th>No</th>
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