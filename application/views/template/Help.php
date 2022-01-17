<div class="container col-md-8 mb-5" style="padding-top: 4rem;">
    <div class="row">
        <div class="table-responsive">

            <div class="container-fluid">
                <style>
                    p {
                        text-indent: 5em;
                    }
                </style>

                <tr>
                    <td>
                        <div class="card">
                            <div class="card-header">
                                <h1>Helper!</h1>
                            </div>
                            <div class="container">
                                <div class="container mb-3 p-3">
                                    <h4 class="pt-3 mb-3">Petunjuk pemakaian:</h4>

                                    <p>Artikel ini ditujukan untuk pengguna yang bingung dengan cara pemakain situs ini. Pertama yang harus disiapkan sebelum memulai <b>mencari informasi lowongan kerja</b> yang relevan dengan keinginan anda adalah mempersiapkan kata kunci yang mempersentasikan dan atau setidaknya mewakili salah satu, beberapa atau seluruhnya dari posisi jabatan, bidang pekerjaan, lokasi pilihan, dan nama perusahaan.</p>
                                    <p>Jika telah anda tentukan, silahkan ikuti langkah berikut: Isi <b>Kata Kunci Pilihan</b> anda pada Search Form kemudian <b>Tekan</b> Search Button, Enjoy!</p>
                                </div>
                                <hr>
                                <div class="container mb-3 p-3">
                                    <h4 class="mb-3">Ada pertanyaan?</h4>

                                    <div class="alert alert-success alert-dismissible fade show my-alert d-none" role="alert">
                                        <strong>Terima Kasih!</strong> Kami telah menerima pertanyaan anda. Beri kami waktu untuk menjawab...
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                    <form name="submit-to-google-sheet">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text" class="form-control" id="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Alamat Email</label>
                                            <input name="email" type="email" class="form-control" id="email" placeholder="email_anda@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="question" class="form-label">Pesan</label>
                                            <textarea name="question" class="form-control" id="question" rows="3"></textarea>
                                        </div>

                                        <button class="btn btn-outline-primary btn-kirim" type="submit">Send</button>
                                        <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Loading...
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </div>

        </div>
    </div>
</div>

<!-- script submit to google sheet -->
<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbwcWF1n6rEBYIUVQSsNfK8RfUJSHT0_BVhICt-0zS_gt8I0SP7ht36awqk_mroyW9z3/exec';
    const form = document.forms['submit-to-google-sheet'];
    const btnKirim = document.querySelector('.btn-kirim');
    const btnLoading = document.querySelector('.btn-loading');
    const myAlert = document.querySelector('.my-alert');

    form.addEventListener('submit', e => {
        e.preventDefault();
        // ketika btn-kirim diklik
        // tampilkan btn-loading, hilangkan btn-kirim
        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');
        fetch(scriptURL, {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => {
                // tampilkan btn-kirim, hilangkan btn-loading
                btnLoading.classList.toggle('d-none');
                btnKirim.classList.toggle('d-none');
                // tampilkan alert
                myAlert.classList.toggle('d-none');
                // reset form (hilangkan tulisan yg ada di form)
                form.reset();
                console.log('Success!', response)
            })
            .catch(error => console.error('Error!', error.message));
    });
</script>