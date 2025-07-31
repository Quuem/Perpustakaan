<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Forum >&nbsp;<a href="<?= base_url('Forum/Kategori') ?>"> Kategori</a> &nbsp;> Edit
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
                <form class="card" method="post"
                    action="<?= base_url('Forum/Kategori/editKategori/' . $kategori->kategori_id) ?>"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Judul Kategori : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="<?= $kategori->nama_kategori ?>"
                                    name="Kategori" placeholder="Masukkan Judul Kategori" />
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <label class="col-2 text-center col-form-label required">Jenis Kategori : </label>
                            <div class="col-9">
                                <select id="filter-kategori" name="JenisKategori" class="form-select"
                                    style="width: 325px;">
                                    <?php foreach ($JenisKategori as $Kat): ?>
                                        <option <?= $Kat == $kategori->jenis_kategori ? 'selected' : '' ?>
                                            value="<?= htmlspecialchars($Kat) ?>"><?= htmlspecialchars($Kat) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
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