<?php
$id = $_GET['id'];
if ($db->deleteProduk($id) > 0) {
    echo
        "
        <script>
            alert('Data telah dihapus');
            document.location.href = 'index.php?page=module/produk/index';
        </script>
        ";
} else {
    echo
        "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'index.php?page=module/produk/index';
        </script>
        ";
}
