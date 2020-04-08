<?php
$conn = mysqli_connect('localhost', 'root', 'mysql', 'db_penjualan_rubik');
$hari = $_POST['hari'];
// $bln = explode('-', $bulan);


?>
<!DOCTYPE html>

<head>
    <title>Cetak Laporan Perhari</title>
    <style>
        html,
        body {
            background: #eee;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }


        .container {
            width: 1200px;
            margin: 25px auto;
            /* padding-left: 100px; */
        }

        /*design table 1*/
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;

            border: 1px solid #999;
            padding: 8px 20px;
        }

        .contoh-link:hover {
            background: #16A085;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div>
                <center>
                    <h1>UKM Dua Putra</h1>
                    <h5>Jl. Tuanku Nan Biru, Ampang Gadang, VII Koto Talago.</h5>
                    <h5>No Tlp. : 0819 629 431</h5>
                    <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </center>
            </div>
        </div>
        <br>
        <h3 align="center"><u>Laporan Data Penjualan <?php echo $hari  ?></u></h3>
        <br>
        <div class="row">
            <div>
                <div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>No Hp</th>
                                <th>Tanggal</th>
                                <th>Tujuan Pengiriman</th>
                                <th>Total Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $hari = $_POST['hari'];
                            $ambil = $conn->query("SELECT * FROM tb_pemesanan 
                            LEFT JOIN tb_pelanggan ON tb_pemesanan.pelanggan_id=tb_pelanggan.pelanggan_id WHERE pemesanan_status != 'Pending' AND pemesanan_status  != 'Batal' AND tb_pemesanan.pemesanan_tgl LIKE '$hari%' ");
                            while ($pecah = $ambil->fetch_object()) {
                                // var_dump($pecah);
                                $total += $pecah->pemesanan_total;
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $pecah->pelanggan_nama ?></td>
                                    <td><?= $pecah->pelanggan_tlp ?></td>
                                    <td><?= $pecah->pemesanan_tgl ?></td>
                                    <td><?= $pecah->pemesanan_kota ?></td>
                                    <td>Rp. <?= number_format($pecah->pemesanan_total);  ?></td>
                                </tr>
                            <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total</td>
                                <td>Rp. <?= number_format($total); ?> </td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
        window.print();
    </script> -->
</body>

</html>