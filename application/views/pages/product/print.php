<body onload="window.print()">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
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
                        <td><?= $row->id ?></td>
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
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>