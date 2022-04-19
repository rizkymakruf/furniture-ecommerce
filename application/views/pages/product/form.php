<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    <h3>Formulir Produk</h3>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>

                    <?= form_input(['type' => 'hidden', 'name' => 'id', 'value' => random_string('alnum', 13), 'class' => 'form-control', 'required' => true]) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="form-group pb-3">
                        <label for="">Produk</label>
                        <?= form_input(['type' => 'text', 'name' => 'title', 'value' => $input->title, 'class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>

                        <?= form_error('title') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">Deskripsi</label>
                        <?= form_textarea(['name' => 'description', 'value' => $input->description, 'row' => 4, 'class' => 'form-control']) ?>
                        <?= form_error('description') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">Biaya Produksi</label>
                        <input type="number" name="production_cost" id="production_cost" value="<?= $input->production_cost; ?>" class="form-control" required onkeyup="cost()">

                        <?= form_error('production_cost') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">Harga</label>
                        <?= form_input(['type' => 'number', 'name' => 'price', 'id' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true]) ?>
                        <small style="color: darkgray;">*Harga : cost + untung 50%</small> <br>
                        <?= form_error('price') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">Berat</label>
                        <input type="number" name="weight" id="weight" class="form-control" required value="<?= $input->weight; ?>">
                        <?= form_error('weight') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">Kategori</label>
                        <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control']) ?>
                        <?= form_error('id_category') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">Ada Stock ?</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 0, 'checked' => $input->is_available == 0 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Kosong</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar</label>
                            <input class="form-control" type="file" id="image" name="image">
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>
                        </div>
                        <div class="">
                            <?php if (isset($input->image)) : ?>
                                <img src="<?= base_url("/images/product/$input->image") ?>" alt="" height="150">
                            <?php endif ?>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E;">
                        <i class="fas fa-save"></i> Simpan
                    </button>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function cost() {
            var cost = document.getElementById('production_cost').value;
            var untung = (50 / 100) * parseInt(cost);
            var result = parseInt(cost) + parseInt(untung);
            if (!isNaN(result)) {
                document.getElementById('price').value = result;
            }
        }
    </script>
</main>