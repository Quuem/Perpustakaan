<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title"> KM Berita</h2>
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
                ?>
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
                            <div class="col d-flex flex-column gap-2">
                                <div class="dropdown">
                                    Show
                                    <a class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                        <span id="page-count" class="me-1">6</span>
                                    </a>
                                    Entities
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" onclick="setPageListItems(event)" data-value="6">6
                                            records</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)" data-value="12">12
                                            records</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)" data-value="24">24
                                            records</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)" data-value="54">54
                                            records</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)" data-value="100">100
                                            records</a>
                                    </div>
                                </div>

                                <select id="filter-kategori" class="form-select" style="width: 200px;">
                                    <option selected disabled hidden>Pilih Kategori</option>
                                    <option value="all">Semua Kategori</option>
                                    <?php foreach ($Kategori as $kat): ?>
                                        <option value="<?= $kat->nama_kategori ?>"><?= $kat->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-auto col-sm-12">
                                <div class="ms-auto d-flex flex-wrap btn-list">
                                    <div class="d-flex flex-column align-items-end gap-2">
                                        <!-- Search Input -->
                                        <div class="input-group input-group-flat w-auto">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-1">
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                </svg>
                                            </span>
                                            <input id="advanced-table-search" type="text" class="form-control"
                                                autocomplete="off" />
                                        </div>

                                        <!-- Button -->

                                        <?php if (
                                            $this->session->userdata('nama_role') == 'Admin' ||
                                            $this->session->userdata('nama_role') == 'Pustakawan'
                                        ) { ?>
                                            <a href="<?= base_url('KM_Berita/Tambah') ?>"
                                                class="btn btn-primary ">Tambah</a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <div id="advanced-table" class="w-100">
                                <div class="row list justify-content-center">

                                    <?php foreach ($Berita as $berita) { ?>
                                        <div class="item col-md-4 mb-3 mt-3" data-kategori="<?= $berita->nama_kategori ?>">
                                            <div class="card"
                                                style="max-width: 22rem; border: 3px solid #ced4da; box-shadow: 0 8px 12px rgba(0,0,0,0.15);">
                                                <img src="<?= base_url('Assets/') ?>KMS/Berita/<?= $berita->gambar ?>"
                                                    alt="Preview" class="img-fluid w-100"
                                                    style="object-fit: cover; height: 200px; border-top: 1px solid #e3e3e3;">
                                                <div class="card-body">
                                                    <h6 class="card-title sort-judul text-truncate-multiline"
                                                        id="sort-judul">
                                                        <?= $berita->judul_berita ?>
                                                    </h6>

                                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                                        <a href="<?= base_url('KM_Berita/Detail/') . $berita->berita_id ?>"
                                                            class="text-decoration-none">Read More &gt;&gt;</a>

                                                        <?php if (
                                                            $this->session->userdata('nama_role') == 'Admin' ||
                                                            $this->session->userdata('nama_role') == 'Pustakawan'
                                                        ) { ?>
                                                            <div class="d-flex gap-2">
                                                                <a href="<?= base_url('KM_Berita/Edit/') . $berita->berita_id ?>"
                                                                    class="btn btn-outline-success" title="Edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#delete-berita<?= $berita->berita_id ?>"
                                                                    class="btn btn-outline-danger" title="Delete"
                                                                    data-id="<?= $berita->berita_id ?>">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </a>


                                                                <!-- Modal Delete -->

                                                                <div class="modal fade"
                                                                    id="delete-berita<?= $berita->berita_id ?>" tabindex="-1"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                            <div class="modal-status bg-danger"></div>
                                                                            <div class="modal-body text-center py-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="icon mb-2 text-danger icon-lg">
                                                                                    <path d="M12 9v4" />
                                                                                    <path
                                                                                        d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                                                                                    <path d="M12 16h.01" />
                                                                                </svg>
                                                                                <h3>Are you sure?</h3>
                                                                                <div class="text-secondary">
                                                                                    Do you really want to delete this item? This
                                                                                    action
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
                                                                                            <a href="<?= base_url('KM_Berita/deleteBerita/' . $berita->berita_id) ?>"
                                                                                                class="btn btn-danger w-100"
                                                                                                id="confirmDelete">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>

                                <!-- Pagination -->
                                <ul class="pagination mt-3 justify-content-end"></ul>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
            <script>
                const PAGE_COUNT_BERITA = "BERITA";

                const setPageListItems = (e) => {
                    const value = parseInt(e.target.value || e.target.dataset.value);
                    if (!value) return;

                    localStorage.setItem(PAGE_COUNT_BERITA, value);

                    const list = window.tabler_list?.["advanced-table"];
                    if (!list) return;

                    list.page = value;
                    list.update();

                    const pageCountEl = document.querySelector("#page-count");
                    if (pageCountEl) {
                        pageCountEl.textContent = value;
                    }
                };

                window.tabler_list = window.tabler_list || {};

                document.addEventListener("DOMContentLoaded", function () {
                    const savedPageCount = parseInt(localStorage.getItem(PAGE_COUNT_BERITA)) || 6;

                    const list = new List("advanced-table", {
                        valueNames: ["sort-judul", "sort-dokumentasi"],
                        listClass: "list",
                        page: savedPageCount,
                        pagination: {
                            item: (value) => {
                                return `<li class="page-item"><a class="page-link cursor-pointer">${value.page}</a></li>`;
                            },
                            innerWindow: 1,
                            outerWindow: 1,
                            left: 0,
                            right: 0,
                        },
                    });

                    window.tabler_list["advanced-table"] = list;

                    const pageCountEl = document.querySelector("#page-count");
                    if (pageCountEl) {
                        pageCountEl.textContent = savedPageCount;
                    }

                    // Event filter kategori
                    const kategoriFilter = document.getElementById("filter-kategori");
                    if (kategoriFilter) {
                        kategoriFilter.addEventListener("change", function () {
                            const selectedKategori = this.value.toLowerCase();

                            if (selectedKategori === "all") {
                                list.filter(); // Reset semua filter
                            } else {
                                list.filter(function (item) {
                                    const kategori = item.elm.getAttribute("data-kategori");
                                    if (!kategori) return false;
                                    return kategori.toLowerCase() === selectedKategori;
                                });
                            }
                        });
                    }

                    const searchInput = document.querySelector("#advanced-table-search");
                    if (searchInput) {
                        searchInput.addEventListener("input", () => {
                            list.search(searchInput.value);
                        });
                    }

                    const selector = document.getElementById("page-size-selector");
                    if (selector) {
                        selector.addEventListener("change", setPageListItems);
                    }

                    const deleteButtons = document.querySelectorAll(".delete-button");
                    const confirmDelete = document.getElementById("confirmDelete");

                    deleteButtons.forEach(button => {
                        button.addEventListener("click", function () {
                            const id = this.getAttribute("data-id");
                            const deleteUrl = `<?= base_url('KM_Berita/deleteBerita/') ?>${id}`;
                            confirmDelete.setAttribute("href", deleteUrl);

                        });
                    });
                });
            </script>

        </div>
    </div>
</div>
</div>
<!-- END PAGE BODY -->