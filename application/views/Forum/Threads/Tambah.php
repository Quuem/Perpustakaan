<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title"> <a href="<?= base_url('KM_Pelatihan') ?>">
                        Threads</a> &nbsp;> Tambah Threads</h2>
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
                <form class="card" method="post" action="<?= base_url('Forum/Threads/addThread') ?>"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Judul Threads : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="<?= set_value('judul_forum') ?>"
                                    name="judul_forum" required placeholder="Masukkan Judul Threads" />
                                <?= form_error('judul_forum', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Isi Threads </label>
                            <div class="col-9">
                                <textarea class="form-control" name="isi_forum" required data-bs-toggle="autosize"
                                    placeholder="Buat Thread Yang Menarik"><?= set_value('isi_forum') ?></textarea>
                                <?= form_error('isi_forum', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Komunitas : </label>
                            <div class="col-10">
                                <select name="komunitas" style="width: 265px;" required id="" class="form-select">
                                    <option hidden>Pilih Komunitas</option>
                                    <?php foreach ($Komunitas as $kat): ?>
                                        <option value="<?= $kat->komunitas_id ?>"><?= $kat->nama_komunitas ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('komunitas', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>




                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Upload Gambar : </label>
                            <div class="col-9">
                                <input class="form-control" type="file" id="fileInput" name="gambar">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="reset" class="btn btn-success">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BODY -->