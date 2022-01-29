<?php
$user = $this->db->get_where('guru', ['nuptk' => $this->session->userdata['username']])->row_array();

$cek = $this->db->get_where('materi', ['materi_guru' => $user['id_guru']])->num_rows();

?>
<div class="d-flex justify-content-center">
    <button class="btn btn-primary btn-sm">Upload Materi</button>
</div>

<?php if ($cek < 1) { ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <small style="color: #bd3609 ;">Anda belum mengupload materi apapun</small>
        </div>
    </div>
<?php } else { ?>



<?php } ?>