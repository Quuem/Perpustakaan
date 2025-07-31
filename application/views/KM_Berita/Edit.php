<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title"> <a href="<?= base_url('KM_Berita') ?>">
                        KM Berita </a> &nbsp;> Edit Data</h2>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADER -->
<!-- BEGIN PAGE BODY -->
<div class="page-body">
    <div class="container-xl">




        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="alert-icon">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/alert-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon alert-icon icon-2">
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </svg>
                </div>
                <?= $this->session->flashdata('error'); ?>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php } ?>

        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-icon">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon alert-icon icon-2">
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
                <?= $this->session->flashdata('success'); ?>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php } ?>



        <div class="card">
            <div class="">
                <form class="card" method="post" action="<?= base_url('KM_Berita/editBerita/') . $berita->berita_id ?>"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Judul Berita : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="<?= $berita->judul_berita ?>"
                                    name="Judul" required placeholder="Masukkan Judul Berita" />
                                <?= form_error('Judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Deskripsi : </label>
                            <div class="col-9">
                                <textarea class="form-control" name="Isi" required data-bs-toggle="autosize"
                                    placeholder="Masukkan Deskripsi Berita"> <?= htmlspecialchars($berita->isi_berita) ?> </textarea>
                                <?= form_error('Isi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Tanggal Upload : </label>
                            <div class="col-9">
                                <input type="date" value="<?= $berita->tanggal_publish ?>" name="Tanggal"
                                    style="width: 150px" required class="form-control" />
                                <?= form_error('Tanggal', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Kategori : </label>
                            <div class="col-9">
                                <select name="kategori_id" style="width: 265px;" required id="" class="form-select">
                                    <?php foreach ($kategori as $kat): ?>
                                        <option <?= $kat->kategori_id == $berita->kategori_id ? 'selected' : '' ?>
                                            value="<?= $kat->kategori_id ?>"><?= $kat->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kategori_id', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Link YouTube (Opsional) : </label>
                            <div class="col-9">
                                <input type="url" value="<?= $berita->link_video ?>" name="link_video" id="link_video"
                                    class="form-control" placeholder="https://www.youtube.com/watch?v=abcdefghijklmn">
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Upload Gambar : </label>
                            <div class="col-9">
                                <input class="form-control" type="file" id="fileInput" name="gambar">
                                <?= form_error('gambar', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Upload File : </label>
                            <div class="col-9">
                                <input class="form-control" type="file" id="fileInput" name="uploaded_file">
                            </div>
                        </div> -->
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BODY -->