<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">THREADS</h2>
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








        <div class="row row-cards">
            <div class="">
                <div class="card-table">
                    <div class="card-header">
                        <div class="row w-full">
                        </div>

                        <div class="col-md-auto col-sm-12">
                            <div class="ms-auto d-flex flex-wrap btn-list">
                                <div class="d-flex flex-column align-items-end gap-2">
                                    <!-- Search Input -->


                                    <!-- Button -->




                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="advanced-table">
                    <div class="row list">

                        <div class="col-12 mb-3 mt-3 item">
                            <div class="card w-100">
                                <div class="container my-4">
                                    <!-- Post Utama -->
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p style="font-size: 12px;" class="card-title sort-nama" id="sort-nama">
                                                    <?= $Threads->username ?>&nbsp;:&nbsp;
                                                    <?= $Threads->tanggal_dibuat ?>
                                                </p>


                                                <?php if (
                                                    $this->session->userdata('user_id') == $Threads->user_id ||
                                                    in_array($this->session->userdata('nama_role'), ['Admin', 'Pustakawan'])
                                                ) {
                                                    ?>

                                                    <div class="card-actions">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn-action dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon icon-1">
                                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                    </path>
                                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                    </path>
                                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="<?= base_url('Forum/Threads/Edit/' . $Threads->forum_id) ?>">Edit
                                                                    Thread</a>

                                                                <a class="dropdown-item text-danger"
                                                                    data-bs-target="#delete-thread" data-bs-toggle="modal"
                                                                    href="#">Delete
                                                                    Thread</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>


                                            </div>


                                            <div class="modal fade" id="delete-thread" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="modal-status bg-danger"></div>
                                                        <div class="modal-body text-center py-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="icon mb-2 text-danger icon-lg">
                                                                <path d="M12 9v4" />
                                                                <path
                                                                    d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                                                                <path d="M12 16h.01" />
                                                            </svg>
                                                            <h3>Are you sure?</h3>
                                                            <div class="text-secondary">
                                                                Do you really want to delete this item? This action
                                                                cannot be
                                                                undone.
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="w-100">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <button class="btn w-100"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    <div class="col">
                                                                        <a href="<?= base_url('Forum/Threads/deleteThread/' . $Threads->forum_id) ?>"
                                                                            class="btn btn-danger w-100"
                                                                            id="confirmDelete">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <p style="font-size: 20px;" class="card-title sort-judul fw-bold"
                                                id="sort-judul">
                                                <?= $Threads->judul_forum ?>
                                            </p>
                                            <?php if (!empty($Threads->gambar)) { ?>
                                                <hr style="border-top: 2px solid #000;">
                                                <div class="mb-3 text-center">
                                                    <img src="<?= base_url('Assets/KMS/Forum/' . $Threads->gambar) ?>"
                                                        style="cursor: pointer; width: 42%;" data-bs-toggle="modal"
                                                        data-bs-target="#modalGambar-<?= $Threads->forum_id ?>">
                                                </div>

                                                <div class="modal fade" id="modalGambar-<?= $Threads->forum_id ?>"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered ">
                                                        <div class="modal-content bg-transparent border-0">
                                                            <div class="modal-body text-center p-0">
                                                                <img src="<?= base_url('Assets/KMS/Forum/' . $Threads->gambar) ?>"
                                                                    class="img-fluid rounded shadow-lg" alt="Gambar Besar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <hr style="border-top: 2px solid #000;">
                                            <?php } ?>


                                            <p class="card-text">
                                                <?= nl2br($Threads->isi_forum) ?>
                                            </p>

                                            <div class="d-flex gap-2 mt-3">
                                                <!-- <button class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-hand-thumbs-up me-1"></i> Like
                                                    </button>
                                                    <button class="btn btn-outline-secondary btn-sm">
                                                        <i class="bi bi-hand-thumbs-down me-1"></i> Dislike
                                                    </button> -->
                                            </div>
                                        </div>

                                        <?php
                                        $page = $this->uri->segment(4);
                                        ?>

                                        <!-- Form Komentar -->
                                        <form action="<?= base_url('Forum/Threads/addKomentar') ?>" method="post">
                                            <div class="card-footer p-2">

                                                <div class="input-group">
                                                    <!-- Icon + Username -->
                                                    <span class="input-group-text bg-primary text-white">
                                                        <i class="bi bi-person me-1"></i>
                                                        <?= $this->session->userdata('username'); ?>
                                                    </span>

                                                    <!-- Hidden Inputs -->
                                                    <input type="hidden" name="forum_id"
                                                        value="<?= $Threads->forum_id ?>">
                                                    <input type="hidden" name="pageNumber" value="<?= $page ?>">

                                                    <!-- Komentar Input -->
                                                    <input type="text" name="Komentar" class="form-control"
                                                        placeholder="Tulis komentar yang menarik..." required>

                                                    <!-- Tombol Kirim -->
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bi bi-send"></i> Kirim
                                                    </button>
                                                </div>


                                            </div>
                                        </form>
                                    </div>

                                    <!-- Komentar dan Balasan -->
                                    <div id="comment-container-<?= $Threads->forum_id ?>">
                                        <?php foreach ($Threads->komentar as $index => $kom) { ?>
                                            <!-- Komentar Utama -->
                                            <div class="card mb-3 komentar-item <?= $index >= 5 ? 'd-none' : '' ?>">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-start">
                                                        <i class="bi bi-person-circle fs-4 me-2"></i>
                                                        <div class="flex-grow-1">
                                                            <strong>
                                                                <?= $kom->nama_user ?> <small
                                                                    class="text-muted">@<?= $kom->username ?></small>
                                                            </strong>
                                                            <p class="mb-1" id="komentar-text-<?= $kom->komentar_id ?>">
                                                                <?= htmlspecialchars($kom->isi_komentar) ?>
                                                            </p>
                                                        </div>

                                                        <?php
                                                        $canEditDelete = (
                                                            $this->session->userdata('user_id') == $kom->user_id ||
                                                            in_array($this->session->userdata('nama_role'), ['Admin', 'Pustakawan'])
                                                        );
                                                        ?>
                                                        <?php if ($canEditDelete): ?>
                                                            <!-- Dropdown Aksi Komentar -->
                                                            <div class="card-actions ms-2">
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn-action dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <!-- SVG icon -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-1">
                                                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                            </path>
                                                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                            </path>
                                                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                            </path>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <!-- Edit Komentar Modal Trigger -->
                                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#edit-comment-<?= $kom->komentar_id ?>">Edit
                                                                            Komentar</a>
                                                                        <a class="dropdown-item text-danger" href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete-comment-<?= $kom->komentar_id ?>">Delete
                                                                            Komentar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>

                                                    <div class="d-flex gap-2 mb-2 mt-2">
                                                        <button class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-reply-<?= $kom->komentar_id ?>">
                                                            <i class="bi bi-reply-fill me-1"></i>Balas
                                                        </button>
                                                    </div>

                                                    <!-- Balasan -->
                                                    <?php if (!empty($kom->balasan)): ?>
                                                        <div class="ps-4 mt-3 border-start border-2">
                                                            <?php foreach ($kom->balasan as $balasan) { ?>
                                                                <div class="d-flex align-items-start mb-3 position-relative">
                                                                    <i class="bi bi-person-circle fs-5 me-2"></i>
                                                                    <div class="flex-grow-1">
                                                                        <strong>
                                                                            <?= $balasan->nama_user_balasan ?> <small
                                                                                class="text-muted">@<?= $balasan->username_balasan ?></small>
                                                                        </strong>
                                                                        <p class="mb-1"
                                                                            id="balasan-text-<?= $balasan->balasan_id ?>">
                                                                            <?= htmlspecialchars($balasan->isi_balasan) ?>
                                                                        </p>
                                                                    </div>

                                                                    <!-- Dropdown Aksi Balasan -->

                                                                    <?php if (
                                                                        $this->session->userdata('user_id') == $balasan->pembalas_id ||
                                                                        in_array($this->session->userdata('nama_role'), ['Admin', 'Pustakawan'])
                                                                    ) { ?>

                                                                        <div class="card-actions ms-2">
                                                                            <div class="dropdown">
                                                                                <a href="#" class="btn-action dropdown-toggle"
                                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                                        class="icon icon-1">
                                                                                        <path
                                                                                            d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                                        </path>
                                                                                    </svg>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <!-- Edit Balasan Modal Trigger -->
                                                                                    <a class="dropdown-item" href="#"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#edit-reply-<?= $balasan->balasan_id ?>">Edit
                                                                                        Balasan</a>
                                                                                    <a class="dropdown-item text-danger" href="#"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#delete-reply-<?= $balasan->balasan_id ?>">Delete
                                                                                        Balasan</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>

                                                                </div>

                                                                <!-- Modal Edit Balasan -->
                                                                <div class="modal fade" id="edit-reply-<?= $balasan->balasan_id ?>"
                                                                    tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <form method="post"
                                                                                action="<?= base_url('Forum/Threads/editBalasan/' . $Threads->forum_id) ?>">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Edit Balasan</h5>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <textarea class="form-control" rows="4"
                                                                                        name="isi_balasan"
                                                                                        required><?= htmlspecialchars($balasan->isi_balasan) ?></textarea>
                                                                                    <input type="hidden" name="balasan_id"
                                                                                        value="<?= $balasan->balasan_id ?>">
                                                                                    <input type="hidden" name="pageNumber"
                                                                                        value="<?= $page ?>">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Batal</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Simpan
                                                                                        Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Modal Delete Balasan -->
                                                                <div class="modal fade"
                                                                    id="delete-reply-<?= $balasan->balasan_id ?>" tabindex="-1"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Konfirmasi Hapus Balasan
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Apakah Anda yakin ingin menghapus balasan ini?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                <a href="<?= base_url('Forum/Threads/deleteBalasan/' . $balasan->balasan_id . '/' . $page) ?>"
                                                                                    class="btn btn-danger">Hapus</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Modal Edit Komentar -->
                                            <div class="modal fade" id="edit-comment-<?= $kom->komentar_id ?>" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-md modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="post"
                                                            action="<?= base_url('Forum/Threads/editKomentar/' . $Threads->forum_id) ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Komentar</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <textarea class="form-control" rows="4" name="isi_komentar"
                                                                    required><?= htmlspecialchars($kom->isi_komentar) ?></textarea>
                                                                <input type="hidden" name="komentar_id"
                                                                    value="<?= $kom->komentar_id ?>">
                                                                <input type="hidden" name="pageNumber" value="<?= $page ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Balas Komentar Utama -->
                                            <div class="modal fade" id="modal-reply-<?= $kom->komentar_id ?>" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-md modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="post"
                                                            action="<?= base_url('Forum/Threads/addBalasan/' . $kom->forum_id) ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Balas Komentar</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <textarea class="form-control" rows="4" name="balasan"
                                                                    placeholder="Tulis balasan Anda di sini..."
                                                                    required></textarea>
                                                                <input type="hidden" name="komentar_id"
                                                                    value="<?= $kom->komentar_id ?>">
                                                                <input type="hidden" name="pageNumber" value="<?= $page ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Kirim
                                                                    Balasan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Delete Komentar -->
                                            <div class="modal fade" id="delete-comment-<?= $kom->komentar_id ?>"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus Komentar</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus komentar ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url('Forum/Threads/deleteKomentar/' . $kom->komentar_id . '/' . $page) ?>"
                                                                class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>


                                    <!-- Tombol Load More -->
                                    <div class="text-center my-3">
                                        <button class="load-more-btn btn btn-outline-primary"
                                            data-thread-id="<?= $Threads->forum_id ?>">Lihat Komentar
                                            Lainnya</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Untuk semua tombol load-more
                const loadMoreButtons = document.querySelectorAll(".load-more-btn");

                loadMoreButtons.forEach(button => {
                    button.addEventListener("click", function () {
                        const threadId = this.getAttribute("data-thread-id");
                        const container = document.querySelector(`#comment-container-${threadId}`);
                        const hiddenComments = container.querySelectorAll(".komentar-item.d-none");

                        // Tampilkan 1 komentar setiap klik
                        hiddenComments.forEach((kom, index) => {
                            if (index < 3) {
                                kom.classList.remove("d-none");
                            }
                        });
                        // Sembunyikan tombol jika tidak ada komentar tersembunyi
                        if (container.querySelectorAll(".komentar-item.d-none").length === 0) {
                            this.style.display = "none";
                        }
                    });
                });
            });
        </script>

















    </div>
</div>
</div>
<!-- END PAGE BODY -->