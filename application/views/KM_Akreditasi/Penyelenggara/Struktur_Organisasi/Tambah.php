<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title"> KM Akreditasi > Penyelenggara >&nbsp; <a
                        href="<?= base_url('KM_Akreditasi/Penyelenggara/Struktur_Organisasi') ?>">
                        Struktur Organisasi </a> &nbsp;> Tambah Data</h2>

            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADER -->
<!-- BEGIN PAGE BODY -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="">
                <form class="card" method="post"
                    action="<?= base_url('KM_Akreditasi/Penyelenggara/Struktur_Organisasi/addStrukturOrganisasi') ?>"
                    enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="mb-5 row">
                            <label class="col-3 col-form-label required">Nama : </label>
                            <div class="col">
                                <textarea required name="Judul" class="form-control" data-bs-toggle="autosize"
                                    placeholder="Masukkan Nama"><?= set_value('Judul') ?></textarea>
                                <?= form_error('Judul', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <label class="col-3 col-form-label required">Jabatan : </label>
                            <div class="col">
                                <textarea required class="form-control" name="Deskripsi" data-bs-toggle="autosize"
                                    placeholder="Masukkan Deskripsi TUgas"><?= set_value('Deskripsi') ?></textarea>
                                <?= form_error('Deskripsi', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <label class="col-3 col-form-label required">Deskripsi Tugas : </label>
                            <div class="col">
                                <textarea  class="form-control" name="Deskripsi2" data-bs-toggle="autosize"
                                    placeholder="Masukkan Deskripsi TUgas"><?= set_value('Deskripsi2') ?></textarea>
                                <?= form_error('Deskripsi2', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <label class="col-3 col-form-label required">Kategori : </label>
                            <div class="col">
                                <select name="Kategori" style="width: 265px;" required id="" class="form-select">
                                    <?php foreach ($Kategori as $kat): ?>
                                        <option value="<?= $kat->kategori_id ?>"><?= $kat->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kategori_id', '<small class="text-danger">', '</small>'); ?>
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