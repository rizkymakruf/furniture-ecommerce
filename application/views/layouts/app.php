<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

    <title><?= isset($title) ? $title : 'furnitureshop'; ?> | Custom Your Furniture</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- FotnAwesome CSS -->
    <link rel="stylesheet" href="/assets/libs/fontawesome/css/all.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/assets/css/app.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="shortcut icon" href="/images/logo/333.png">

    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('layouts/_navbar'); ?>
    <!-- End Navbar -->

    <!-- Content -->
    <?php $this->load->view($page); ?>
    <!-- End Content -->

    <script src="/assets/libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app.js"></script>

</body>


<footer class="py-3 my-4" style="background-color: wheat;">
    <center>
        <img src="/images/logo/logo-furniture-shop.png" alt="" style="width: 150px;" class="pb-3">
    </center>
    <p class="text-center text-muted" style="color: saddlebrown;">&copy; 2021 FurnitureShop, Inc</p>
</footer>



</html>