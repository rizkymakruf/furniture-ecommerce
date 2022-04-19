<main role="main" class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="5" class="">Daftar Order Saya</th>
                        </tr>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Order Id</th>
                            <th>Tagihan</th>
                            <th>Metode Pembayaran</th>
                            <th>Status Payment</th>
                            <th>Status Pesanan</th>
                            <th>Cara Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($midtrans as $d) :  $no++; ?>
                            <?php if ($d->id_user == $this->session->userdata('id')) { ?>
                                <tr class="text-center">
                                    <td><?= $no; ?></td>
                                    <td><a href="<?= base_url("/myorder/detail/$d->id") ?>">#<?= $d->id; ?></a></td>
                                    <td>Rp<?= number_format($d->gross_amount, 0, ',', '.') ?>,-</td>
                                    <td><?= $d->payment_type; ?> : <?= $d->bank; ?></td>
                                    <td><?php $this->load->view('layouts/_statusPayment', ['status_code' => $d->status_code]); ?></td>
                                    <td><?php $this->load->view('layouts/_status', ['status' => $d->status]); ?></td>
                                    <td>
                                        <a href="<?= $d->pdf_url; ?>" target="_blank">
                                            <span class="badge bg-primary p-2">Klik</span>
                                        </a>
                                    </td>

                                </tr>
                            <?php } ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>