<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnngGrapes</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- My Icon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/main.png" >

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>

<body>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url(); ?>assets/images/main.png" width="30" height="30" class="rounded-circle d-inline-block align-top" alt="UnngGrapes">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                Un-ngGrapes
            </a>
        </div>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if ($this->uri->segment(1) == 'search'): ?>
                <form class="d-flex start" action="<?= base_url(); ?>search" method="post">
                        <input type="text" class="form-control" placeholder="<?= $keyword; ?>" aria-label="Recipient's username" name="keyword" autocomplete="off">
                        <input class="btn btn-outline-primary" type="submit" name="submit" value="search">
                </form>
            <?php endif ?>
        
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>help">Help</a>
                </li>
            </ul>
        </div>

        <button class="navbar-toggler end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- navbar end -->