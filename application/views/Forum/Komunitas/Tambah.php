<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Forum >&nbsp;<a href="<?= base_url('Forum/Komunitas') ?>"> Komunitas</a> &nbsp;> Tambah
                    Data</h2>
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
                <form class="card" method="post" action="<?= base_url('Forum/Komunitas/addKomunitas') ?>"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Judul Komunitas : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="Komunitas"
                                    placeholder="Masukkan Judul Komunitas" />
                                <?= form_error('Komunitas', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

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