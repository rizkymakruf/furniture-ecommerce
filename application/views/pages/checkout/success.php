<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Checkout Berhasil
                </div>
                <div class="card-body">
                    <h5 class="pb-2">Terima kasih, sudah berbelanja di toko kami.</h5>
                    <p>Pesanan anda akan segera kami proses.</p>
                    <p>Jika pembayaran telah terverifikasi oleh payment gateway, barang akan segera di produksi dan di kirim.</p>
                    <br>

                </div>
                <div class="card-footer">
                    <a href="<?= base_url('/') ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Lanjut Belanja</a>
                    <div class="float-end">
                        <a href="<?= base_url("/myorder") ?>" class="btn btn-info" style="color: white;">
                            <i class="fas fa-shopping-bag"></i> My Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>