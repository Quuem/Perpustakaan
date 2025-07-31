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
            <div class="card">
                <div class="card-table">
                    <div class="card-header">
                        <div class="row w-full">
                            <div class=" d-flex flex-column gap-2">
                                <div class="d-flex mb-2 flex-row justify-content-between align-items-center">

                                    <form method="get" action="<?= base_url('Forum/Threads/Page') ?>"
                                        class="d-flex mb-3 align-items-center">
                                        <select id="filter-kategori" name="komunitas" class="form-select me-2"
                                            style="width: 200px;">
                                            <option disabled hidden <?= $KomunitasPick === null ? 'selected' : '' ?>>Pilih
                                                Komunitas</option>
                                            <option value="all" <?= $KomunitasPick === 'all' ? 'selected' : '' ?>>Semua
                                                Komunitas</option>
                                            <?php foreach ($Komunitas as $kom): ?>
                                                <option value="<?= $kom->nama_komunitas ?>"
                                                    <?= $KomunitasPick == $kom->nama_komunitas ? 'selected' : '' ?>>
                                                    <?= $kom->nama_komunitas ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>

                                        <input type="text" name="search" class="form-control me-2"
                                            placeholder="Cari judul..." value="<?= $this->input->get('search') ?>"
                                            style="min-width: 420px;">

                                        <button type="submit" class="btn btn-info me-2">Cari</button>
                                        <a href="<?= base_url('Forum/Threads/Page') ?>"
                                            class="btn btn-warning">Reset</a>
                                    </form>



                                    <!-- <div class="col-md-auto col-sm-12"> -->

                                    <a href="<?= base_url('Forum/Threads/Tambah') ?>"
                                        class="btn btn-primary ">Tambah</a>

                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="advanced-table">
                        <div class="row list">
                            <?php
                            $page = $this->uri->segment(4);

                            foreach ($Threads as $thread) { ?>
                                <div class="col-12 mb-3 mt-3 item">
                                    <div class="card w-100">
                                        <div class="container my-4">
                                            <!-- Post Utama -->
                                            <div class=" mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p style="font-size: 12px;" class="card-title sort-nama"
                                                            id="sort-nama">
                                                            <?= $thread->username ?>&nbsp;:&nbsp;
                                                            <?= $thread->tanggal_dibuat ?>
                                                        </p>
                                                    </div>

                                                    <a href="<?= base_url('Forum/Threads/Detail/' . $thread->forum_id) ?>"
                                                        style="font-size: 20px;" class="card-title sort-judul fw-bold"
                                                        id="sort-judul">
                                                        <?= $thread->judul_forum ?>
                                                    </a>
                                                    <p class="card-text">
                                                        <?= character_limiter($thread->isi_forum, 90) ?>
                                                    </p>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Daftar Thread + Komentar-mu -->

                        <!-- Pagination -->
                        <div class="text-end">
                            <?= $this->pagination->create_links(); ?>
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

                document.getElementById('filter-kategori').addEventListener('change', function () {
                    this.form.submit();
                });
            </script>
        </div>
    </div>
</div>
<!-- END PAGE BODY -->