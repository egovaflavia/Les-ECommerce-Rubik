<?php
if (isset($_POST["simpan"])) {
    if ($db->uPemesanan($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Update');
        document.location.href = 'index.php?page=module/pemesanan/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Update');
        document.location.href = 'index.php?page=module/pemesanan/index';
        </script>";
    }
}

$id = $_GET['id'];
$dPembayaran = $db->getPembayaranPemesanan($id);
// var_dump($dPembayaran);

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Pembayaran </li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Pembayaran</div>
    <div class="card-body">
        <a href="?page=module/pemesanan/index" class="btn btn-primary ">Kembali</a>
        <br><br>
        <div class="row">
            <div class="col-md-8">
                <?php if (empty($dPembayaran)) { ?>
                    <h2>Belum Melakukan Pembayaran</h2>
                <?php } elseif ($dPembayaran->pembayaran_metode == "Cash On Delivery") { ?>
                    <h2>Pembayaran Cash On Delivery</h2>
                <?php } else { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Metode Pembayaran</th>
                                    <th>Nama Pengirim</th>
                                    <th>Bank</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dPembayaran as $no => $dPembayaran) {
                                    // var_dump($dPembayaran);
                                ?>
                                    <?php
                                    if ($dPembayaran->pembayaran_metode == "Cash On Delivery") { ?>
                                        <h2> Metode Pembayaran : Cash On Delivery</h2>
                                    <?php } else { ?>
                                        <tr>
                                            <td><?= $dPembayaran->pembayaran_metode ?></td>
                                            <td><?= $dPembayaran->pembayaran_nama_pengirim ?></td>
                                            <td>
                                                <?php if (empty($dPembayaran->pembayaran_bank)) { ?>
                                                    COD
                                                <?php } ?>
                                            </td>
                                            <td><?= rupiah($dPembayaran->pembayaran_jumlah) ?></td>
                                            <td><?= TglIndo($dPembayaran->pembayaran_tgl) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>

                    <br>
                    <div class="panel-body">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Status Pembayaran</label>
                                <div class="form-label-group">
                                    <select class="form-control" name="status">
                                        <option value="Pending">Pending</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Pesanan Di Kirim">Pesanan Di Kirim</option>
                                        <option value="Batal">Batal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <button name="simpan" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>

            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <?php if ($dPembayaran->pembayaran_metode != "Cash On Delivery") { ?>
                        <h5>Bukti Pembayaran</h5>
                        <img class="img-resposnsive" style="width:100%; height:350px;" src="assets/gambar_bukti/<?= $dPembayaran->pembayaran_gambar_bukti ?>" alt="Tidak ada gambar">
                        <div class="caption">
                        <?php } ?>
                    <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>