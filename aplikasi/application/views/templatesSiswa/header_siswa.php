
<!-- jumbotron -->
<section style="background-color: rgb(16, 170, 162); padding: 2rem 1rem;" class="jumbotron text-center mb-0">
      <img src="<?= base_url('assets/img/') . $user['foto']; ?>" alt="Maulal Ardi Atqo" width="250" class="rounded-circle" /> <br><br>
      <h2 style="color: azure;"><?= $user['nama']; ?></h2>
      <p style="color: azure;"><?= $user['username']; ?></p>
</section>
<div class="d-flex justify-content-center navbar-dark bg-info">
      <ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden;">
        <li style="float: left;"><a style="display: block; color: white; text-align: center;padding: 10px 14px; text-decoration: none; transition: 0.3s;" href="<?= base_url('siswa')?>" class="text-white">Home</a></li>
        <li style="float: left;"><a style="display: block; color: white; text-align: center;padding: 10px 14px; text-decoration: none; transition: 0.3s;" href="<?= base_url('siswa/jadwal')?>" class="text-white">Jadwal</a></li>
        <li style="float: left;"><a style="display: block; color: white; text-align: center;padding: 10px 14px; text-decoration: none; transition: 0.3s;" href="<?= base_url('siswa/materi')?>" class="text-white">Materi</a></li>
        <li style="float: left;"><a style="display: block; color: white; text-align: center;padding: 10px 14px; text-decoration: none; transition: 0.3s;" href="<?= base_url('siswa/tugas')?>" class="text-white">Tugas</a></li>
        <li style="float: left;"><a style="display: block; color: white; text-align: center;padding: 10px 14px; text-decoration: none; transition: 0.3s;" href="<?= base_url('siswa/ujian')?>" class="text-white">Ujian</a></li>
      </ul>
    </div>