<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <a href="<?= base_url('faq') ?>">FAQ</a> &nbsp;> Edit FAQ
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADER -->

<!-- BEGIN PAGE BODY -->
<div class="page-body">
    <div class="container-xl">

        <!-- Tampilkan flashdata error -->
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="alert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon icon-2" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </svg>
                </div>
                <?= $this->session->flashdata('error'); ?>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php } ?>

        <!-- Tampilkan flashdata success -->
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon icon-2" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
                <?= $this->session->flashdata('success'); ?>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php } ?>

        <!-- Card Form -->
        <div class="card">
            <form enctype="multipart/form-data" class="card" method="post"
                action="<?= site_url('Faq/editFaq/' . $Faq->faq_id) ?>">
                <div class="card-body">

                    <!-- Judul FAQ -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label required">Judul FAQ :</label>
                        <div class="col-9">
                            <input type="text" name="judul_faq" class="form-control"
                                value="<?= $Faq->judul_faq ?>" placeholder="Masukkan Judul FAQ" required />
                            <?= form_error('judul_faq', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Isi FAQ -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label required">Isi FAQ :</label>
                        <div class="col-9">
                            <textarea name="isi_faq" class="form-control" rows="5" placeholder="Masukkan Isi FAQ"
                                required><?= $Faq->isi1 ?></textarea>
                            <?= form_error('isi_faq', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- Gambar 1 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Gambar 1 :</label>
                        <div class="col-9">
                            <input type="file" name="gambar1" class="form-control">
                        </div>
                    </div>

                    <!-- Tambahan Isi 2 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Isi 2 :</label>
                        <div class="col-9">
                            <textarea name="isi2" class="form-control" rows="4"
                                placeholder="Masukkan Isi 2"><?= $Faq->isi2?></textarea>
                        </div>
                    </div>





                    <!-- Gambar 2 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Gambar 2 :</label>
                        <div class="col-9">
                            <input type="file" name="gambar2" class="form-control">
                        </div>
                    </div>



                    <!-- Tambahan Isi 3 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Isi 3 :</label>
                        <div class="col-9">
                            <textarea name="isi3" class="form-control" rows="4"
                                placeholder="Masukkan Isi 3"><?= $Faq->isi3 ?></textarea>
                        </div>
                    </div>

                    <!-- Gambar 3 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Gambar 3 :</label>
                        <div class="col-9">
                            <input type="file" name="gambar3" class="form-control">
                        </div>
                    </div>



                    <!-- Tambahan Isi 4 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Isi 4 :</label>
                        <div class="col-9">
                            <textarea name="isi4" class="form-control" rows="4"
                                placeholder="Masukkan Isi 4"><?= $Faq->isi4?></textarea>
                        </div>
                    </div>

                    <!-- Gambar 4 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Gambar 4 :</label>
                        <div class="col-9">
                            <input type="file" name="gambar4" class="form-control">
                        </div>
                    </div>

                    <!-- Tambahan Isi 5 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Isi 5 :</label>
                        <div class="col-9">
                            <textarea name="isi5" class="form-control" rows="4"
                                placeholder="Masukkan Isi 5"><?= $Faq->isi5 ?></textarea>
                        </div>
                    </div>

                    <!-- Gambar 5 -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label">Gambar 5 :</label>
                        <div class="col-9">
                            <input type="file" name="gambar5" class="form-control">
                        </div>
                    </div>


                    <!-- Kategori -->
                    <div class="mb-5 row">
                        <label class="col-2 text-center col-form-label required">Kategori :</label>
                        <div class="col-9">
                            <select name="kategori_id" class="form-select" required>
                                <option hidden selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $kat): ?>
                                    <option value="<?= $kat->kategori_id ?>" <?= $kat->kategori_id == $Faq->kategori_id ? 'selected' : '' ?> <?= set_select('kategori_id', $kat->kategori_id) ?>>
                                        <?= htmlspecialchars($kat->nama_kategori) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('kategori_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-end">
                    <a href="<?= site_url('faq') ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END PAGE BODY -->