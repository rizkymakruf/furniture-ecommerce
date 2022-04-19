<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

                        <div class="col-lg">
                            <div class="p-3">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold;">Register</h1>
                                </div>

                                <?= form_open('register', ['method' => 'POST']) ?>

                                <?= form_input(['type' => 'hidden', 'name' => 'id', 'value' => random_string('alnum', 12), 'class' => 'form-control', 'required' => true]) ?>

                                <!-- email -->
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'placeholder' => 'Masukkan nama lengkap']) ?>
                                    <?= form_error('name') ?>
                                </div>

                                <!-- username -->
                                <div class="form-group">
                                    <label for="">E-Mail</label>
                                    <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email anda', 'required' => true]) ?>
                                    <?= form_error('email') ?>
                                    <small id="emailHelp" class="form-text text-muted">We'll not share your email</small>
                                </div>

                                <!-- password -->
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter', 'required' => true]) ?>
                                </div>

                                <!-- password -->
                                <div class="form-group">
                                    <label for="">Konfirmasi Password</label>
                                    <?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password yang sama', 'required' => true]) ?>
                                    <?= form_error('password_confirmation') ?>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E; font-weight: bold;">
                                    <i class="far fa-address-card"></i> Register
                                </button>
                                <?= form_close() ?>
                            </div>

                            <div class="text-center">

                                <div class="pe-4 ps-4">
                                    <hr>
                                </div>

                                <span>Already have an account?</span>
                                <a href="<?= base_url('/login') ?>" class="">Login
                                    <?= form_close() ?>
                                </a>
                            </div>

                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>