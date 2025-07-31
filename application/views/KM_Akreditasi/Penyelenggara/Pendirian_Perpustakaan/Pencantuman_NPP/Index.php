<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">KM Akreditasi > Penyelenggara > Pendirian Perpustakaan > Pencantuman NPP</h2>
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
                                    <option selected disabled hidden>Pilih Materi Kategori</option>
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
                                            <a href="<?= base_url('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Tambah') ?>"
                                                class="btn btn-primary ">Tambah</a>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="advanced-table">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-selectable">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            <button class="table-sort d-flex justify-content-between"
                                                data-sort="sort-nama">Pencantuman</button>
                                        </th>

                                        <th class="text-center">
                                            <button class="table-sort  d-flex justify-content-between "
                                                data-sort="sort-file">Image</button>
                                        </th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>

                                <tbody class="table-tbody">
                                    <?php foreach ($PencantumanNPP as $Kom) { ?>
                                        <tr data-kategori="<?= $Kom->nama_kategori ?>">
                                            <td class="nomor"></td>
                                            <td class="sort-nama "><?= $Kom->judul_komponen ?></td>

                                            <td class="sort-file">
                                                <?php if ($Kom->dokumen): ?>
                                                    <img src="<?= base_url('Assets/KMS/KM_Akreditasi/Penyelenggara/Pencantuman_NPP/' . $Kom->dokumen) ?>"
                                                        alt="Foto"
                                                        style="max-width: 300px; max-height: 250px; width: auto; height: auto;"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalGambar-<?= $Kom->komponen_id ?>">

                                                    <div class="modal fade" id="modalGambar-<?= $Kom->komponen_id ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered ">
                                                            <div class="modal-content bg-transparent border-0">
                                                                <div class="modal-body text-center p-0">
                                                                    <img src="<?= base_url('Assets/KMS/KM_Akreditasi/Penyelenggara/Pencantuman_NPP/' . $Kom->dokumen) ?>"
                                                                        class="img-fluid rounded shadow-lg" alt="Gmabar">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <span>Tidak ada file</span>
                                                <?php endif; ?>
                                            </td>


                                            <?php if (
                                                $this->session->userdata('nama_role') == 'Admin' ||
                                                $this->session->userdata('nama_role') == 'Pustakawan'
                                            ) { ?>
                                                <td>
                                                    <a href="<?= base_url('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Edit/') . $Kom->komponen_id ?>"
                                                        class="btn  btn-outline-success"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#delete-NPP<?= $Kom->komponen_id ?>"
                                                        class="btn  btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            <?php } ?>
                                        </tr>



                                        <div class="modal fade" id="delete-NPP<?= $Kom->komponen_id ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <div class="modal-status bg-danger"></div>
                                                    <div class="modal-body text-center py-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
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
                                                                    <a href="<?= base_url('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/deletePencantumanNPP/' . $Kom->komponen_id) ?>"
                                                                        class="btn btn-danger w-100"
                                                                        id="confirmDelete">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">

                            <ul class="pagination m-0 ms-auto">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const advancedTable = {
                    headers: [
                        { "data-sort": "sort-nama", name: "Nama" },
                        { "data-sort": "sort-file", name: "File" },
                    ],
                };



                const PAGE_COUNT_PENGETAHUAN = "NPP_PAGE_COUNT";

                const setPageListItems = (e) => {
                    const value = parseInt(e.target.dataset.value);
                    localStorage.setItem(PAGE_COUNT_PENGETAHUAN, value);
                    const list = window.tabler_list?.["advanced-table"];
                    if (!list) return;

                    list.page = value;
                    list.update();
                    document.querySelector("#page-count").textContent = value;
                };

                window.tabler_list = window.tabler_list || {};

                document.addEventListener("DOMContentLoaded", function () {
                    const savedPageCount = parseInt(localStorage.getItem(PAGE_COUNT_PENGETAHUAN)) || 10;

                    // Set default tampil di tombol
                    document.querySelector("#page-count").textContent = savedPageCount;

                    const list = (window.tabler_list["advanced-table"] = new List("advanced-table", {
                        sortClass: "table-sort",
                        listClass: "table-tbody",
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
                        valueNames: advancedTable.headers.map((header) => header["data-sort"]),
                    }));

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
                });
            </script>
        </div>
    </div>
</div>
</div>
<!-- END PAGE BODY -->