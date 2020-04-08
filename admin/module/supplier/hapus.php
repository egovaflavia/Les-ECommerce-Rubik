<?php
$id = $_GET['id'];
if ($db->deleteSupplier($id) > 0) {
    echo
        "
        <script>
            alert('Data telah dihapus');
            document.location.href = 'index.php?page=module/supplier/index';
        </script>
        ";
} else {
    echo
        "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'index.php?page=module/supplier/index';
        </script>
        ";
}
