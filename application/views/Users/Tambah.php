<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <a href="<?= base_url('User') ?>">Manajemen Pengguna</a> &nbsp;> Tambah User
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADER -->

<!-- BEGIN PAGE BODY -->
<div class="page-body">
    <div class="container-xl">

        <!-- Flash Message -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="alert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" fill="none"
                        stroke-width="2" class="icon alert-icon icon-2">
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </svg>
                </div>
                <?= $this->session->flashdata('error'); ?>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" fill="none"
                        stroke-width="2" class="icon alert-icon icon-2">
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
                <?= $this->session->flashdata('success'); ?>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php endif; ?>


        <div class="card">
            <form class="card" method="post" action="<?= base_url('Users/addUser') ?>">
                <div class="card-body">

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama Lengkap</label>
                        <div class="col">
                            <input type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>"
                                class="form-control" placeholder="Masukkan Nama Lengkap" required />
                            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Username</label>
                        <div class="col">
                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control"
                                placeholder="Masukkan Username" required />
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Email</label>
                        <div class="col">
                            <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control"
                                placeholder="Masukkan Email" required />
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Password</label>
                        <div class="col">
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password"
                                required />
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Konfirmasi Password</label>
                        <div class="col">
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Ulangi Password" required />
                            <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Role</label>
                        <div class="col">
                            <select name="role_id" class="form-select" required>
                                <option hidden selected>Pilih Role</option>
                                <?php foreach ($role as $rol): ?>
                                    <option value="<?= $rol->role_id ?>" <?= set_select('role_id', $rol->role_id) ?>>
                                        <?= $rol->nama_role ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('role_id', '<small class="text-danger">', '</small>'); ?>
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
<!-- END PAGE BODY -->