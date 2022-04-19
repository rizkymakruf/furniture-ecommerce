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
                                <td>Product</td>
                                <td><?= $d->product_title; ?></td>
                            </tr>
                            <tr>
                                <td>Qty</td>
                                <td><?= $d->qty; ?></td>
                            </tr>
                            <tr>
                                <td>Tagihan</td>
                                <td>Rp<?= number_format($d->gross_amount, 0, ',', '.') ?>,-</td>
                            </tr>
                            <tr>
                                <td>Biaya Ongkir</td>
                                <td>Rp <?= number_format($d->ongkir, 0, ',', '.') ?>,-</td>
                            </tr>
                            <tr>
                                <td>Ekspedisi</td>
                                <td><?= $d->ekspedisi; ?></td>
                            </tr>
                            <tr>
                                <td>Metode Pembayaran</td>
                                <td><?= $d->payment_type; ?> : <?= $d->bank; ?></td>
                            </tr>
                            <tr>
                                <td>Date</td>
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
                                    <?php $this->load->view('layouts/_status', ['status' => $d->status]); ?>
                                </td>
                            </tr>
                            <!-- <tr>
                        <td>No. Resi</td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="No.Resi"  aria-describedby="button-addon2">
                                <button class="input-group-text" type="button" id="button-addon2">Simpan</button>
                            </div>
                        </td>
                    </tr> -->

                            <!-- <tr>
                        <td colspan="2">
                            <a href="myorder">
                            <button class="btn btn-primary">
                                <i class="fas fa-chevron-left "></i> Back
                            </button>
                            </a>    
                        </td>
                    </tr> -->

                        </table>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
</main>