<!-- PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title"> <a href="<?= base_url('KM_Berita') ?>">
                        Berita </a> &nbsp;> Detail</h2>
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
                        style="height: 250px; background-image: url('<?= base_url('Assets/KMS/Berita/' . $Berita->gambar) ?>'); background-size: cover; background-position: center;">
                    </div>
                    <div class="p-4">
                        <h1 class="mb-0"><?= $Berita->judul_berita ?></h1>
                    </div>
                </div>

                <div class="card card-lg">
                    <div class="card-body markdown">
                        <div class="mb-4">
                            <h4 class="text-secondary fw-bold mb-2">Deskripsi</h4>
                            <p class=" mb-0">
                                <?= nl2br($Berita->isi_berita) ?>
                            </p>
                        </div>
                        <?php if (!empty($Berita->link_video)): ?>
                            <div class="video-embed text-center">
                                <iframe width="560" height="315" src="<?= $Berita->link_video ?>" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>

                        <?php endif; ?>



                        <hr class="my-3" />

                    </div>
                </div>




            </div>
        </div>
    </div>
</div>