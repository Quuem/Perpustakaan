<!-- PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <a href="<?= base_url('Faq') ?>">FAQ</a> &nbsp;> Detail
                </h2>
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

                <!-- COVER HEADER -->
                <div class="card card-lg overflow-hidden mb-4">
                    <div class="p-4">
                        <h1 class="mb-0"><?= htmlspecialchars($Faq->judul_faq) ?></h1>
                    </div>
                </div>

                <div class="card card-lg">
                    <div class="card-body markdown">

                        <!-- Jawaban FAQ -->
                        <?php for ($i = 1; $i <= 5; $i++) {
                            $isi = $Faq->{'isi' . ($i == 1 ? '1' : $i)};
                            $gambar = $Faq->{'gambar' . $i};
                            if (!empty($isi)) { ?>
                                <div class="mb-4">
                                    <?php if ($i > 1): ?>
                                    <?php else: ?>
                                        <h4 class="text-secondary fw-bold mb-2">Jawaban</h4>
                                    <?php endif; ?>
                                    <p class="mb-0"><?= nl2br(htmlspecialchars($isi)) ?></p>
                                </div>
                            <?php } ?>

                            <?php if (!empty($gambar) && file_exists(FCPATH . 'Assets/KMS/Faq/' . $gambar)) { ?>
                                <div class="text-start mb-4">
                                    <img src="<?= base_url('Assets/KMS/Faq/' . $gambar) ?>" alt="Gambar FAQ <?= $i ?>"
                                        class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                                    <div class="text-muted small mt-2"></div>
                                </div>
                            <?php } ?>

                            <?php if (!empty($isi) || !empty($gambar)) {
                                echo '<hr class="my-3" />';
                            } ?>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>