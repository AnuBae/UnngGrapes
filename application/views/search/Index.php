<div class="container" style="padding-top: 4rem;">
    <div class="row">
        <div class="table-responsive">

            <div class="row justify-content-center mt-5">
                <div class="col-md-12 col-lg-12 mb-5">
                    <div class="portfolio-item mx-auto">
                        <table class="table text-center" id="table_akhir" style="width:100%">
                            <thead>
                                <h3 class="masthead-subheading text-center font-weight-bold mb-3">List Lowongan Kerja</h3>
                                <tr>
                                    <th>NO</th>
                                    <th>Lowongan</th>
                                    <th>Perusahaan</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $j = 0;
                                foreach ($nilai_tfidf as $dataTfidf) : ?>
                                    <tr onclick="window.open('<?= $dataTfidf['link_tfidf']; ?>');">
                                        <th><?= ++$j; ?></th>
                                        <th class="text-start"><?= $dataTfidf['title_tfidf']; ?></th>
                                        <th><?= $dataTfidf['perusahaan_tfidf']; ?></th>
                                        <th><?= $dataTfidf['lokasi_tfidf']; ?></th>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <script>
                                $(document).ready(function() {
                                    $('#table_akhir').DataTable({
                                        searching: false
                                    });
                                });
                            </script>
                        </table>
                    </div>
                </div>
            </div>

            <p>
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#hideContent" aria-expanded="false" aria-controls="collapseExample">
                    Lihat Pembobotan
                </button>
            </p>

            <div class="collapse" id="hideContent">
                <div class="card card-body">

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-12 col-lg-12 mb-5">
                            <div class="portfolio-item mx-auto">
                                <table class="table text-center" id="lowongan" style="width:100%">
                                    <thead>
                                        <h3 class="masthead-subheading text-center font-weight-bold mb-3">List Data Lowongan</h3>
                                        <!-- <h6 class="masthead-subheading text-center font-weight-bold mb-3">Results : <?= $total_rows; ?></h6>
                                <h6 class="masthead-subheading text-center font-weight-bold mb-3">Results : <?= count($nilai_tf); ?></h6> -->
                                        <tr class="text-center">
                                            <th>NO</th>
                                            <th>Lowongan</th>
                                            <th>Perusahaan</th>
                                            <th>Lokasi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $start = 0;
                                        foreach ($lowongan as $lwng) : ?>
                                            <tr onclick="window.open('<?= $lwng['link_lowongan']; ?>');">
                                                <th><?= ++$start; ?></th>
                                                <th class="text-start"><?= $lwng['title_lowongan']; ?></th>
                                                <th><?= $lwng['nama_perusahaan']; ?></th>
                                                <th><?= $lwng['lokasi_perusahaan']; ?></th>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>

                                    <script>
                                        $(document).ready(function() {
                                            $('#lowongan').DataTable({
                                                searching: false
                                            });
                                        });
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-12 col-lg-12 mb-5">
                            <div class="portfolio-item mx-auto">
                                <table class="table text-center" id="table_tf" style="width:100%">
                                    <thead>
                                        <h3 class="masthead-subheading text-center font-weight-bold mb-3">List of Nilai TF</h3>
                                        <tr>
                                            <th rowspan="2">NO</th>
                                            <th rowspan="2">Lowongan</th>
                                            <th colspan="<?= count($arrKeyword); ?>">Kata Kunci</th>
                                            <th rowspan="2">Total TF</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($arrKeyword as $key) : ?>
                                                <th><?= $key; ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $j = 0;
                                        foreach ($nilai_tf as $dataTf) : ?>
                                            <tr onclick="window.open('<?= $dataTf['link_tf']; ?>');">
                                                <th><?= ++$j; ?></th>
                                                <th class="text-start"><?= $dataTf['title_tf']; ?></th>
                                                <?php foreach ($arrKeyword as $key) : ?>
                                                    <th><?= $dataTf[$key]; ?></th>
                                                <?php endforeach; ?>
                                                <th><?= $dataTf['total_tf']; ?></th>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                    <script>
                                        $(document).ready(function() {
                                            $('#table_tf').DataTable({
                                                searching: false
                                            });
                                        });
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-12 col-lg-12 mb-5">
                            <div class="portfolio-item mx-auto">
                                <table class="table text-center" style="width:100%">
                                    <thead>
                                        <h3 class="masthead-subheading text-center font-weight-bold mb-3">List of Nilai IDF</h3>
                                        <tr>
                                            <th>NO</th>
                                            <th>Term</th>
                                            <th>DF</th>
                                            <th>IDF</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $j = 0;
                                        foreach ($nilai_idf as $dataIdf) : ?>
                                            <tr>
                                                <th><?= ++$j; ?></th>
                                                <th><?= $dataIdf['term']; ?></th>
                                                <th><?= $dataIdf['df']; ?></th>
                                                <th><?= $dataIdf['idf']; ?></th>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-12 col-lg-12 mb-5">
                            <div class="portfolio-item mx-auto">
                                <table class="table text-center" id="table_tfidf" style="width:100%">
                                    <thead>
                                        <h3 class="masthead-subheading text-center font-weight-bold mb-3">List of Nilai TF-IDF</h3>
                                        <tr>
                                            <th>NO</th>
                                            <th>Lowongan</th>
                                            <?php foreach ($arrKeyword as $key) : ?>
                                                <th><?= $key; ?></th>
                                            <?php endforeach; ?>
                                            <th>Total TFIDF</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $j = 0;
                                        foreach ($nilai_tfidf as $dataTfidf) : ?>
                                            <tr onclick="window.open('<?= $dataTfidf['link_tfidf']; ?>');">
                                                <th><?= ++$j; ?></th>
                                                <th class="text-start"><?= $dataTfidf['title_tfidf']; ?></th>
                                                <?php foreach ($arrKeyword as $key) : ?>
                                                    <th><?= $dataTfidf[$key]; ?></th>
                                                <?php endforeach; ?>
                                                <th><?= $dataTfidf['total_tfidf']; ?></th>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                    <script>
                                        $(document).ready(function() {
                                            $('#table_tfidf').DataTable({
                                                searching: false
                                            });
                                        });
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>