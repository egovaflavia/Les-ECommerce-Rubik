<?php
$id = $_GET['id'];
if ($db->deleteAdmin($id) > 0) {
    echo
        "
        <script>
            alert('Data telah dihapus');
            document.location.href = 'index.php?page=module/admin/index';
        </script>
        ";
} else {
    echo
        "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'index.php?page=module/admin/index';
        </script>
        ";
}
