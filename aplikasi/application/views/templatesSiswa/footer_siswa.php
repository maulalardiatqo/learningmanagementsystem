<nav class="nav">
    <a href="<?= base_url('siswa') ?>" class="nav__link">
        <i class="material-icons nav__icon">home</i>
        <span class="nav__text">Home</span>
    </a>
    <a href="<?= base_url('siswa/jadwal') ?>" class="nav__link">
        <i class="material-icons nav__icon">date_range</i>
        <span class="nav__text">Jadwal</span>
    </a>
    <a href="<?= base_url('siswa/materi') ?>" class="nav__link">
        <i class="material-icons nav__icon">menu_book</i>
        <span class="nav__text">Materi</span>
    </a>
    <a href="<?= base_url('siswa/tugas') ?>" class="nav__link">
        <i class="material-icons nav__icon">edit_note</i>
        <span class="nav__text">Tugas</span>
    </a>
    <a href="<?= base_url('siswa/absen') ?>" class="nav__link">
        <i class="material-icons nav__icon">description</i>
        <span class="nav__text">Nilai</span>
    </a>

</nav>
</div>
<!-- Footer -->
<footer class="sticky-footer" style="background-color: #343a40;">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span style="color: ghostwhite;"> &copy; Copyright <?= date('Y'); ?> Develop : <a style="text-decoration: none;" href="http://maulalardiatqo.github.io">Maulal Ardi Atqo</a></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Scroll to Top Button-->
<!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a> -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan Logout, jika yakin keluar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<!-- Sweet allert-->
<script src="<?= base_url('assets/') ?>sj/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>sj/scriptku.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        $("#edit_foto").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#gambar").attr("src", x);
        })
    })
</script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

</body>

</html>