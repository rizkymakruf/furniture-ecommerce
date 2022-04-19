<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('layouts/_menu'); ?>
        </div>
        <div class="col-md-9">
            <div class="card row">

                <div class="card-header">
                    <h4>Profile</h4>
                </div>

                <div class="card p-2">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $content->image ? base_url("/images/user/$content->image") : base_url("/images/user/avatar.png") ?>" alt="" height="200">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div style="background-color: wheat;">
                                    <h5 class="card-title">Nama : <?= $content->name ?></h5>
                                </div>
                                <div class="mb-3" style="background-color: blanchedalmond;">
                                    <p class="card-text">E-Mail : <?= $content->email ?></p>
                                </div>
                                <a href="<?= base_url("/profile/update/$content->id") ?>" class="">
                                    <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E;">
                                        <i class="fas fa-user-edit"></i> Edit
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
    </div>
</main>