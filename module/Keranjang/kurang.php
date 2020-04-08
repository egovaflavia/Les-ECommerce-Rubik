<?php
// mendapatkan id
$id_produk = $_GET['id'];

// jk ada produk,mk produk +1
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] -= 1;
    // selain itu, mk produk di anggap di beli 1
    if ($_SESSION['keranjang'][$id_produk] == 0) {
        unset($_SESSION["keranjang"][$id_produk]);
    }
}

echo "<script>alert('Produk Telah Di Kurangi');</script>";
echo "<script>window.location='index.php?page=module/Keranjang/index'</script>";
