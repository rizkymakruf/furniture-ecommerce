<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <!-- gambar samping -->
        <div class="col-xl-10 col-lg-12 col-md-9">
            <!-- <div class="col-lg-g"> -->

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <!-- gambar sebelah login -->
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold;">Welcome back !</h1>
                                </div>

                                <?= form_open('login', ['method' => 'POST']) ?>

                                <!-- email -->
                                <div class="form-group">
                                    <label for="">E-Mail</label>
                                    <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email', 'required' => true]) ?>
                                    <?= form_error('email') ?>
                                </div>


                                <!-- password -->
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'required' => true]) ?>
                                    <?= form_error('password') ?>
                                </div>

                                <!-- login -->
                                <div class="text-center">
                                    <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E; font-weight: bold;">
                                        <i class="fas fa-sign-in-alt"></i> Login
                                    </button>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <span>Don't have an account?</span>
                                    <a href="<?= base_url('/register') ?>">Click here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>