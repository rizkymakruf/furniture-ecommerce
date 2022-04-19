<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    <span>Formulir Kategori</span>
                </div>
                <div class="card-body pb-3">
                    <?= form_open($form_action, ['method' => 'POST']) ?>

                    <?= form_input(['type' => 'hidden', 'name' => 'id', 'value' => random_string('alnum', 12), 'class' => 'form-control', 'required' => true]) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="form-group">
                        <label for="">Kategori</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true, 'required' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group pb-3">
                        <label for="">Slug</label>
                        <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true, 'readonly' => true]) ?>
                        <?= form_error('slug') ?>
                    </div>
                    <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E;">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>