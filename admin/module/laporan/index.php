<?php
if (isset($_POST["simpan"])) {
    $gambar_nama   = $_FILES['gambar'];
    // $gambar_nama   = $_FILES['gambar']['name'];
    // $gambar_lokasi = $_FILES['gambar']['tmp_name'];
    if ($db->addProduk($_POST, $gambar_nama, $gambar_lokasi) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href = 'index.php?page=module/produk/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href = 'index.php?page=module/produk/index';
        </script>";
    }
}

$dKategori = $db->getAllKategori();
// var_dump($dKategori);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Laporan Penjualan</li>
</ol>

<div class="card mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Laporan Penjualan</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <form action="module/laporan/perhari.php" target="_blank" method="post">
                    <div class="form-group">
                        <label>Laporan Penjualan Per-Hari</label>
                        <input class="form-control" type="date" name="hari" value="<?php echo date('Y-m-d'); ?>" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Print</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="module/laporan/perbulan.php" target="_blank" method="post">
                    <div class="form-group">
                        <label>Laporan Penjualan Per-Bulan</label>
                        <input class="form-control" type="month" name="bulan" value="<?php echo date('Y-m'); ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Print</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="module/laporan/pertahun.php" target="_blank" method="post">
                    <div class="form-group">
                        <label>Laporan Penjualan Per-Tahun</label>
                        <input class="form-control" type="number" min="2010" max="2100" name="tahun" value="<?php echo date('Y'); ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>