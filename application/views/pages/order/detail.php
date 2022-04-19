<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="row mb-3">
                <div class="col-md-12">

                    <?php foreach ($orders as $d) : ?>

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
                            <tr>
                                <td>Status Payment</td>
                                <td><?php $this->load->view('layouts/_statusPayment', ['status_code' => $d->status_code]); ?></td>
                            </tr>
                            <tr>
                                <td>Status Pesanan</td>
                                <td>
                                    <!-- UPDATE STATUS ORDER -->
                                    <form action="<?= base_url("order/update/$order->id") ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $d->status ?>">
                                        <div class="input-group">
                                            <select name="status" id="" class="form-control">
                                                <option value="pending" <?= $order->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="process" <?= $order->status == 'process' ? 'selected' : '' ?>>Diproses</option>
                                                <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : '' ?>>Dikirim</option>
                                                <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : '' ?>>Dibatalkan</option>
                                            </select>
                                            <button class="input-group-text" id="basic-addon2">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="order">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-chevron-left "></i> Back
                                        </button>
                                    </a>
                                    <a href="<?= base_url("/order/print/$d->id") ?>" target="popup">
                                        <button class=" btn btn-success">
                                            <i class="fa fa-print" aria-hidden="true"></i> Print
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
</main>