<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    <h3>Formulir Edit Pengguna</h3>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>

                    <div class="form-group pb-3">
                        <label for="">Nama</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">E-Mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>

                    <div class="form-group pb-3">
                        <label for="">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="form-group pb-3">
                        <label for="">Role</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Member</label>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="">Status</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => 1, 'checked' => $input->is_active == 1 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => 0, 'checked' => $input->is_active == 0 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Tidak Aktif</label>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="">Foto</label>
                        <br>
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>
                        <?php if (isset($input->image)) : ?>
                            <img src="<?= base_url("/images/user/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>
                    <br> <br>
                    <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E;">
                        <i class="fas fa-save"></i> Simpan
                    </button>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>