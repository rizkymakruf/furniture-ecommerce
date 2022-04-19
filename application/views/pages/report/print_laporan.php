<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'furnitureshop'; ?>-FurnitureCustom</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- FotnAwesome CSS -->
    <link rel="stylesheet" href="/assets/libs/fontawesome/css/all.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/assets/css/app.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="shortcut icon" href="/images/logo/333.png">

    <style>
        @page {}

        div.page {
            page-break-after: always
        }
    </style>

</head>

<body onload="window.print()">
    <div class="container-lg page">
        <div class="card">
            <div class="card-header text-center p-4">
                <img src="/images/logo/logo-furniture-shop.png" alt="" style="width: 150px;" class="float-start">
                <h5 style="font-weight: bold;" class="float-end"><?= $title; ?></h5>
            </div>
            <div class="card-body">
                <caption>Filter By <?= $subtitle; ?></caption>
                <table class="table table-bordered caption-top border border-dark">
                    <tbody class="">
                        <tr class="table-primary bordered border-dark">
                            <th colspan="8" style="text-align: center;">
                                Daftar Order
                            </th>
                        </tr>
                        <tr class="table-success text-center bordered border-dark">
                            <th>No</th>
                            <th>Produk</th>
                            <th>Tanggal</th>
                            <th>Qty</th>
                            <th>Total Belanja</th>
                            <th>Total Biaya Produksi</th>
                            <th>Ongkir</th>
                            <th>Laba</th>
                        </tr>
                        <?php
                        $bruto = 0;
                        $cost = 0;
                        $unit = 0;
                        $ongkir = 0;
                        $no = 1;
                        foreach ($datafilter as $row) : ?>
                            <?php $bruto += $row->gross_amount; ?>
                            <?php $cost += $row->cost; ?>
                            <?php $unit += $row->qty; ?>
                            <?php $ongkir += $row->ongkir; ?>
                            <?php $laba = $row->gross_amount - $row->cost - $row->ongkir ?>
                            <tr class="table-light">
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $row->product_title; ?></td>
                                <td class="text-center"><?= $row->transaction_time; ?></td>
                                <td class="text-center"><?= $row->qty; ?></td>
                                <td><small>Rp<?= number_format($row->gross_amount, 0, ',', '.') ?></small></td>
                                <td><small>Rp<?= number_format($row->cost, 0, ',', '.') ?></small></td>
                                <td><small>Rp<?= number_format($row->ongkir, 0, ',', '.') ?></small></td>
                                <td><small>Rp<?= number_format($laba, 0, ',', '.') ?></small></td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container-lg page">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5 class="float-start">Profit : </h5>
                <h5 class="float-start"><?= $subtitle; ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered border-dark">
                    <tbody>
                        <tr class="">
                            <td colspan="" style=" font-weight: bold;">Total Barang Terjual</td>
                            <td class="text-center">:</td>
                            <td colspan=""><?= $unit; ?> Unit</td>
                        </tr>
                        <tr class="">
                            <td colspan="" style=" font-weight: bold;">Total Pemasukan Kotor</td>
                            <td class="text-center">:</td>
                            <td colspan="">Rp<?= number_format($bruto, 0, ',', '.') ?>,-</td>
                        </tr>
                        <tr class="">
                            <td colspan="" style=" font-weight: bold;">Total Biaya Produksi</td>
                            <td class="text-center">:</td>
                            <td colspan="">Rp<?= number_format($cost, 0, ',', '.') ?>,-</td>
                        </tr>
                        <tr class="">
                            <td colspan="" style=" font-weight: bold;">Total Biaya Ongkir</td>
                            <td class="text-center">:</td>
                            <td colspan="">Rp<?= number_format($ongkir, 0, ',', '.') ?>,-</td>
                        </tr>
                        <?php $profit = $bruto - $cost - $ongkir ?>
                        <tr class="table-success border-dark">
                            <td colspan="" style=" font-weight: bold;">Total Profit</td>
                            <td class="text-center">:</td>
                            <td colspan="" style=" font-weight: bold;">Rp<?= number_format($profit, 0, ',', '.') ?>,-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <center>
            <hr>
            <img src="/images/logo/logo-furniture-shop.png" alt="" style="width: 150px;" class="pb-3"> | &copy; 2021 FurnitureShop, Inc
        </center>
    </div>
</body>

</html>