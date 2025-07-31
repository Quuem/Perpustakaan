<!-- PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title"> <a href="<?= base_url('KM_Pelatihan') ?>">
                        Materi Pelatihan </a> &nbsp;> Detail</h2>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADER -->

<!-- PAGE BODY -->
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">

                <!-- COVER HEADER (Hanya Gambar + Judul) -->
                <div class="card card-lg overflow-hidden mb-4">
                    <div
                        style="height: 250px; background-image: url('<?= base_url('Assets/KMS/Pelatihan/' . $Pelatihan->gambar) ?>'); background-size: cover; background-position: center;">
                    </div>
                    <div class="p-4">
                        <h1 class="mb-0"><?= $Pelatihan->judul_pelatihan ?></h1>
                    </div>
                </div>

                <div class="card card-lg">
                    <div class="card-body markdown">
                        <div class="mb-4">
                            <h4 class="text-secondary fw-bold mb-2">Deskripsi</h4>
                            <p class="mb-0">
                                <?= nl2br($Pelatihan->deskripsi) ?>
                            </p>
                        </div>

                        <hr class="my-3" />

                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('Assets/KMS/Pelatihan/' . $Pelatihan->file_materi) ?>"
                                class="btn btn-primary " target="_blank">
                                Unduh File Materi
                            </a>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>