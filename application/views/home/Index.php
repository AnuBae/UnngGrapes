<!-- search start -->
<div class="container position-absolute top-50 start-50 translate-middle">
    <?php if ($this->session->userdata('alert') == 'keywordNotFound') : ?>

        <div class="container col-md-6">
            <form action="<?= base_url(); ?>search" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="find something..." aria-label="Recipient's username" name="keyword" autocomplete="off" autofocus>
                    <input class="btn btn-outline-primary" type="submit" name="submit" value="Search">
                </div>
            </form>
        </div>

        <div class="container-fluid col-md-8">
            <tr>
                <td>
                    <div class="alert alert-danger" role="alert">
                        <p> <i class="bi bi-exclamation-diamond-fill fs-4"></i> Penelusuran Anda - <?= $this->session->userdata('keyword'); ?> - tidak cocok dengan dokumen apa pun.</p>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <p style="margin-top:1em">Saran:</p>
                        </div>
                        <ul class="list-group list-group-flush list-group-numbered ps-5 col-md-8">
                            <li class="list-group-item">Pastikan semua kata dieja dengan benar.</li>
                            <li class="list-group-item">Coba kata kunci yang lain.</li>
                            <li class="list-group-item">Coba kata kunci yang lebih umum.</li>
                            <li class="list-group-item">Coba kurangi kata kunci.</li>
                            <li class="list-group-item">Cobalah beberapa saat lagi.</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </div>

    <?php else : ?>

        <div class="continer col-md-6 mx-auto text-center">
            <h1 class="display-4">
                Un-ngGrapes
            </h1>
            <p class="lead">Cara Keren Anti Nganggur!</p>
        </div>

        <?php if ($this->session->userdata('alert') == 'nullKeyword') : ?>
            <div class="alert alert-danger alert-dismissible fade show col-md-8 mx-auto" role="alert">
                <strong class="md"><i class="bi bi-exclamation-triangle-fill"></i> Kata Kunci Anda Kosong!</strong> Pastikan form pencarian telah terisi...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="container col-md-6  text-center">
            <form action="<?= base_url(); ?>search" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="find something..." aria-label="Recipient's username" name="keyword" autocomplete="off" autofocus>
                    <input class="btn btn-outline-primary" type="submit" name="submit" value="Search">
                </div>
            </form>
        </div>

    <?php endif; ?>
</div>
<!-- search end -->