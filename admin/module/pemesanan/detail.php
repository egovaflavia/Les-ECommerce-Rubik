<?php
$id = $_GET['id'];
$dDetail = $db->getDetail($id);
$dPelanggan = $db->getOnePemesanan($id);
// var_dump($dPelanggan);


?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Detail Pemesanan </li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Detail Pemesanan <b><?= $dPelanggan->pelanggan_nama ?></b></div>
    <div class="card-body">
        <a href="?page=module/pemesanan/index" class="btn btn-primary ">Kembali</a>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <table>
                    <tr>
                        <th width="200px">Nama Pemesan</th>
                        <th width="20px">:</th>
                        <th><?= $dPelanggan->pelanggan_nama ?></th>
                    </tr>
                    <tr>
                        <th>No Telephone</th>
                        <th>:</th>
                        <th><?= $dPelanggan->pelanggan_tlp ?></th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <th><?= $dPelanggan->pelanggan_email ?></th>
                    </tr>

                </table>
            </div>
            <div class="col-md-6">
                <table>
                    <tr>
                        <th width="170px">Tanggal Pemesanan</th>
                        <th width="20px">:</th>
                        <th><?= TglIndo($dPelanggan->pemesanan_tgl) ?></th>
                    </tr>
                    <tr>
                        <th>Tujuan Pengiriman</th>
                        <th>:</th>
                        <th><?= $dPelanggan->pemesanan_kota ?></th>
                    </tr>
                    <tr>
                        <th>Alamat Pengiriman</th>
                        <th>:</th>
                        <th><?= $dPelanggan->pemesanan_alamat_pengiriman ?></th>
                    </tr>
                    <tr>
                        <th>Ongkos Kirim</th>
                        <th>:</th>
                        <th><?= rupiah($dPelanggan->pemesanan_tarif) ?></th>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <hr>
        <p><b>Daftar Barang yang di pilih :</b></p>
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dDetail as $no => $dDetail) {
                        $total += $dDetail->detail_sub_harga
                        // var_dump($dDetail);
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $dDetail->produk_nama ?></td>
                            <td><?= $dDetail->detail_jumlah ?></td>
                            <td><?= rupiah($dDetail->detail_harga) ?></td>
                            <td><?= rupiah($dDetail->detail_sub_harga) ?></td>
                        </tr>
                    <?php }  ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Total</td>
                        <td><?= rupiah($total) ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>