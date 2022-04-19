<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">


                    <div id="carouselExampleControls" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= base_url('/images/benner/benner-11.png'); ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('/images/benner/benner-22.png'); ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('/images/benner/benner-33.png'); ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
                            <span class="float-end">
                                <i class="fas fa-filter"></i>
                                Urutkan Harga: <a href="<?= base_url("/shop/sortby/asc"); ?>"><span class="badge bg-success"><i class="fas fa-arrow-down"></i> Termurah</span></a> | <a href="<?= base_url("/shop/sortby/desc") ?>"><span class="badge bg-success"><i class="fas fa-arrow-up"></i> Termahal</span></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php $no = 0;
                foreach ($content as $row) : $no++; ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>" alt="" height="" class="card-img-top p-1">

                            <div class="card-body">
                                <h5 class="card-title"><?= $row->product_title ?></h5>
                                <p class="card-text"><strong>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</strong></p>




                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?= $no ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $no ?>" aria-expanded="false" aria-controls="collapse<?= $no ?>">
                                            Detail
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $no ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $no ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="card-text"><?= $row->description ?></p>
                                            <a href="<?= base_url("/shop/category/$row->category_slug") ?>"><span class="badge rounded-pill bg-success"><i class="fas fa-tags"></i> <?= $row->category_title ?></span></a><br>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <form action="<?= base_url("/cart/add") ?>" method="POST">
                                    <input type="hidden" name="id_product" value="<?= $row->id ?>">

                                    <?= form_input(['type' => 'hidden', 'name' => 'id', 'value' => random_string('alnum', 12), 'class' => 'form-control', 'required' => true]) ?>

                                    <!-- Fitur Keranjang -->
                                    <input type="hidden" class="form-control" name="qty" value="1">
                                    <div class="d-grid gap-2">
                                        <button class="btn text-light" id="" style="background-color: #5C3D2E;" onMouseOver="this.style.backgroundColor='tan'" onMouseOut="this.style.backgroundColor='#5C3D2E'">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        <?php endforeach ?>
        </div>

        <nav aria-label="Page navigation example">
            <?= $pagination ?>
        </nav>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header" style="background-color: #E8E8CC;">
                        <a style="font-weight: bold; color: #5C3D2E;">Pencarian</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url("/shop/search") ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Cari" aria-label="Cari" aria-describedby="button-addon2" value="<?= $this->session->userdata('keyword') ?>">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="background-color: tan;" onMouseOver="this.style.backgroundColor='#5C3D2E'" onMouseOut="this.style.backgroundColor='tan'"><i class="fas fa-search text-white"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header" style="background-color: #E8E8CC;">
                        <a style="font-weight: bold; color: #5C3D2E;">Kategori</a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="<?= base_url('/') ?>">
                                <span class="badge rounded-pill" style="background-color: tan;" onMouseOver="this.style.backgroundColor='#5C3D2E'" onMouseOut="this.style.backgroundColor='tan'">
                                    <i class="fas fa-tags"></i> Semua Kategori
                                </span>
                            </a>
                        </li>
                        <?php foreach (getCategories() as $category) : ?>
                            <li class="list-group-item">
                                <a href="<?= base_url("/shop/category/$category->slug") ?>">
                                    <span class="badge rounded-pill" style="background-color: tan;" onMouseOver="this.style.backgroundColor='#5C3D2E'" onMouseOut="this.style.backgroundColor='tan'"><i class="fas fa-tags"></i> <?= $category->title ?></span>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
</main>