<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
</head>

<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3>Keranjang Belanja</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <!-- <th class="text-center">Berat</th> -->
                                <th class="text-center">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $row) : ?>
                                <tr>
                                    <td>
                                        <p><img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url('/images/product/default.png') ?>" alt="" height="50"> <strong><?= $row->title ?></strong></p>
                                    </td>
                                    <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                    <td>
                                        <form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <div class="input-group">
                                                <input type="number" name="qty" class="form-control text-center" value="<?= $row->qty ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="submit" id="button-addon2">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <?php $total_weight = $row->qty * $row->weight ?>
                                    <!-- <td class="text-center"> Kg</td> -->
                                    <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                    <td>
                                        <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    <a href="<?= base_url('/') ?>" class="btn">
                        <button type="" class="btn" style="background-color: tan; color: #5C3D2E;">
                            <i class="fas fa-angle-left"></i> Kembali Belanja
                        </button>
                    </a>
                    <a href="<?= base_url('/checkout') ?>" class="btn float-end">
                        <button type="" class="btn" style="background-color: #5C3D2E; color: white;">
                            Checkout <i class="fas fa-angle-right"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    
</main>

