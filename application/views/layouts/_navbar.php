<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: wheat; font-weight: bold; color: saddlebrown;">
    <div class="container">

        <a class="navbar-nav" href=" <?= base_url('home') ?>">
            <img src="/images/logo/logo-furniture-shop.png" alt="" style="width: 150px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('') ?>" style="color: #5C3D2E;"><i class="fas fa-home"></i> Home <span class=" sr-only">(current)</span></a>
                </li>
                <?php if ($this->session->userdata('role') == 'admin') : ?>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-1" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #5C3D2E;">
                            <i class="fas fa-cogs"></i> Manages
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdown-1" style="background-color: bisque;">
                            <i class="fas fa-filter"></i> Category
                            </a>
                            <a href="<?= base_url('product') ?>" class="dropdown-item" style="color: saddlebrown;">
                                <i class="fas fa-box-open"></i> Products
                            </a>
                            <a href="<?= base_url('order') ?>" class="dropdown-item" style="color: saddlebrown;">
                                <i class="fas fa-store"></i> Orders
                            </a>
                            <a href="<?= base_url('user') ?>" class="dropdown-item" style="color: saddlebrown;">
                                <i class="fas fa-users"></i> Users
                            </a>
                            <a href="<?= base_url('report') ?>" class="dropdown-item" style="color: saddlebrown;">
                                <i class="fas fa-file-alt"></i> Laporan
                            </a>

                        </div>
                    </li>
                <?php endif ?>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('cart') ?>" class="nav-link" style="color: #5C3D2E;"><i class="fas fa-shopping-cart"></i> Cart (<?= getCart(); ?>)</a>
                </li>
                <?php if (!$this->session->userdata('is_login')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/login') ?>" class="nav-link" style="">
                            <h5><span class="badge" style="background-color: #5C3D2E; color: white;">Login</span></h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/register') ?>" class="nav-link" style="color: #5C3D2E;">
                            <h5><span class="badge" style="background-color: #5C3D2E; color: white;">Register</span></h5>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-2" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #5C3D2E;">
                            <?= $this->session->userdata('name') ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdown-2" style="background-color: bisque;">
                            <a href="<?= base_url('/profile') ?>" class="dropdown-item" style="color: saddlebrown;">
                                <i class="fas fa-user"></i> Profile
                            </a>
                            <a href="<?= base_url("/myorder") ?>" class="dropdown-item" style="color: saddlebrown;">
                                <i class="fas fa-shopping-bag"></i> My Orders
                            </a>
                            <a href="<?= base_url('/logout') ?>" class="dropdown-item" style="color: saddlebrown;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                <?php endif ?>

            </ul>
        </div>

    </div>
</nav>