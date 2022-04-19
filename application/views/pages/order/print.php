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

</head>

<body onload="window.print()">
    <div class="container-lg">
        <?php foreach ($ordersp as $d) : ?>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th colspan="2">Detail Order #<?= $order->id ?></th>
                </tr>
                <tr>
                    <td>Order ID</td>
                    <td><?= $d->id; ?></td>
                </tr>
                <tr>
                    <td>User ID</td>
                    <td><?= $d->id_user; ?></td>
                </tr>
                <tr>
                    <td>Product</td>
                    <td><?= $d->product_title; ?></td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td><?= $d->qty; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Tagihan</td>
                    <td>Rp <?= number_format($d->gross_amount, 0, ',', '.') ?>,-</td>
                </tr>
                <tr>
                    <td>Biaya Ongkir</td>
                    <td>Rp <?= number_format($d->ongkir, 0, ',', '.') ?>,-</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td><?= $d->payment_type; ?> : <?= $d->bank; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td><?= $d->transaction_time; ?></td>
                </tr>
                <tr>
                    <td>Penerima</td>
                    <td><?= $d->nama; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $d->alamat; ?>, <?= $d->alamat_api; ?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><?= $d->email; ?></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td><?= $d->telp; ?></td>
                </tr>
                <tr>
                    <td>Custom?</td>
                    <td><?= $d->custom; ?></td>
                </tr>

            </table>
        <?php endforeach ?>
    </div>
</body>

</html>