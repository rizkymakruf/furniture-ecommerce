<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="mx-auto">
            <div class="card mb-3">
                <div class="card-header">

                    <div class="float-start">
                        <h3>Produk</h3>
                    </div>

                    <div class="float-end">
                        <form action="<?= base_url("product/search") ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="<?= base_url("product/reset") ?>" class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Production Cost</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Berat</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($content as $row) : $no++; ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <div>
                                            <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.png") ?>" alt="" height="50">
                                            <?= $row->product_title ?>
                                        </div>


                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-success">
                                            <i class="fas fa-tags"></i> <?= $row->category_title ?>
                                        </span>
                                    </td>
                                    <td>Rp<?= number_format($row->production_cost, 0, ',', '.') ?>,-</td>
                                    <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                    <td><?= $row->is_available ? 'Tersedia' : 'Kosong' ?></td>
                                    <td><?= $row->weight; ?>Kg</td>
                                    <td>
                                        <?= form_open(base_url("/product/delete/$row->id"), ['method' => 'POST']) ?>
                                        <?= form_hidden('id', $row->id) ?>

                                        <a href="<?= base_url("/product/edit/$row->id") ?>" class="btn btn-sm">
                                            <i class="fas fa-edit text-info"></i>
                                        </a>

                                        <button class="btn btn-sm" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <div class="card-footer">
                        <div class="float-start">
                            <a href="<?= base_url('product/create') ?>" class="btn btn-sm ">
                                <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E;">
                                    <i class="fas fa-plus-circle"></i> Tambah
                                </button>
                            </a>
                            <a href="<?= base_url('product/print') ?>" class="btn btn-sm" target="popup">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-print" aria-hidden="true"></i> Print Products
                                </button>
                            </a>
                        </div>
                        <div class="float-end">
                            <nav aria-label="Page navigation example">
                                <?= $pagination ?>
                            </nav>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>