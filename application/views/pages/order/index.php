<main role="main" class="container">
    <div class="row ">
        <div class="col">
            <div class="card">
                <div class="card-header float-start">
                    Daftar Orders
                    <div class="float-end">
                        <?= form_open(base_url('order/search'), ['method' => 'POST']) ?>
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                            <div>
                                <button class="btn btn-info btn-sm text-light" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="<?= base_url('order/reset') ?>" class="btn btn-info btn-sm text-light">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>



                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center ">Order Id</th>
                            <th>Pembeli</th>
                            <th>Jumlah Tagihan</th>
                            <th>Tanggal Transaksi</th>
                            <th class="text-center ">Status Payment</th>
                            <th class="text-center ">Status Pesanan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($content as $d) : $no++; ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><a href="<?= base_url("/order/detail/$d->id") ?>">#<?= $d->id; ?></a></td>
                                <td><?= $d->nama; ?></td>
                                <td>Rp<?= number_format($d->gross_amount, 0, ',', '.') ?>,</td>
                                <td><?= $d->transaction_time ?></td>
                                <td class="text-center">
                                    <?php $this->load->view('layouts/_statusPayment', ['status_code' => $d->status_code]); ?>
                                </td>
                                <td class="text-center">
                                    <?php $this->load->view('layouts/_status', ['status' => $d->status]); ?>
                                </td>
                                <td></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <?= $pagination ?>
                </nav>

            </div>
        </div>
    </div>
</main>