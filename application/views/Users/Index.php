<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Manajemen Pengguna</h2>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2"
                        fill="none" class="icon alert-icon icon-2">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2"
                        fill="none" class="icon alert-icon icon-2">
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
                <?= $this->session->flashdata('success'); ?>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php endif; ?>

        <div class="row row-cards">
            <div class="card">
                <div class="card-table">
                    <div class="card-header">
                        <div class="row w-full">
                            <div class="col">
                                <div class="dropdown">
                                    Show
                                    <a class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                        <span id="page-count" class="me-1">10</span>
                                    </a>
                                    Entries
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" onclick="setPageListItems(event)" data-value="5">5</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)"
                                            data-value="10">10</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)"
                                            data-value="20">20</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)"
                                            data-value="50">50</a>
                                        <a class="dropdown-item" onclick="setPageListItems(event)"
                                            data-value="100">100</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto col-sm-12">
                                <div class="ms-auto d-flex flex-wrap btn-list">
                                    <div class="d-flex flex-column align-items-end gap-2">
                                        <div class="input-group input-group-flat w-auto">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    class="icon icon-1">
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                </svg>
                                            </span>
                                            <input id="advanced-table-search" type="text" class="form-control"
                                                autocomplete="off" placeholder="Cari user..." />
                                        </div>
                                        <a href="<?= base_url('Users/tambah') ?>" class="btn btn-primary">Tambah
                                            User</a>
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
                                        <th><button class="table-sort" data-sort="sort-nama">Nama Lengkap</button></th>
                                        <th><button class="table-sort" data-sort="sort-username">Username</button></th>
                                        <th><button class="table-sort" data-sort="sort-email">Email</button></th>
                                        <th><button class="table-sort" data-sort="sort-role">Role</button></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    <?php $no = 1;
                                    foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td class="sort-nama"><?= $user->nama_lengkap ?></td>
                                            <td class="sort-username"><?= $user->username ?></td>
                                            <td class="sort-email"><?= $user->email ?></td>
                                            <td class="sort-role"><?= $user->nama_role ?></td>
                                            <td>
                                                <a href="<?= base_url('Users/Edit/' . $user->user_id) ?>"
                                                    class="btn btn-outline-success">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#deleteUserModal<?= $user->user_id ?>"
                                                    class="btn btn-outline-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteUserModal<?= $user->user_id ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <div class="modal-status bg-danger"></div>
                                                    <div class="modal-body text-center py-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            class="icon mb-2 text-danger icon-lg">
                                                            <path d="M12 9v4" />
                                                            <path
                                                                d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                                                            <path d="M12 16h.01" />
                                                        </svg>
                                                        <h3>Yakin ingin menghapus user?</h3>
                                                        <p class="text-secondary">Data tidak dapat dikembalikan.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="w-100">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <button class="btn w-100"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                                <div class="col">
                                                                    <a href="<?= base_url('Users/Hapus/' . $user->user_id) ?>"
                                                                        class="btn btn-danger w-100">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <ul class="pagination m-0 ms-auto"></ul>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const advancedTable = {
                    headers: [
                        { "data-sort": "sort-nama", name: "Nama" },
                        { "data-sort": "sort-username", name: "Username" },
                        { "data-sort": "sort-email", name: "Email" },
                        { "data-sort": "sort-role", name: "Role" },
                    ],
                };



                const PAGE_COUNT_PENGETAHUAN = "USERS";

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

                    // Set default tampil d tombol
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