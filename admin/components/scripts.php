<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="assets/vendor/chart.js/Chart.min.js"></script>
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="assets/js/demo/datatables-demo.js"></script>
<script src="assets/js/demo/chart-area-demo.js"></script>

<script>
    var fileInput = document.getElementById('file');

    fileInput.addEventListener('change', function() {
        document.getElementById("gambar_thumbnail").src = URL.createObjectURL(fileInput.files[0]);
    });
</script>