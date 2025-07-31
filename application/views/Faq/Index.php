<!-- <div class="page-body">
    <div class="container-xl">
        <div class="card card-lg">
            <div class="card-body">
                <div class="space-y-4">
                    <div id="faq-1" class="accordion accordion-tabs" role="tablist" aria-multiselectable="true">
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq-1-1" role="tab" aria-expanded="false">
                                    Welcome to our service!
                                    <div class="accordion-button-toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                            <path d="M6 9l6 6l6 -6"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <div id="faq-1-1" class="accordion-collapse collapse" role="tabpanel"
                                data-bs-parent="#faq-1" style="">
                                <div class="accordion-body pt-0">
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                                            dignissimos dolorum ea est eveniet, excepturi illum
                                            in iste iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                            ipsa?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                                            dignissimos dolorum ea est eveniet, excepturi illum
                                            in iste iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                            ipsa?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq-1-2" role="tab" aria-expanded="false">
                                    Who are we?
                                    <div class="accordion-button-toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                            <path d="M6 9l6 6l6 -6"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <div id="faq-1-2" class="accordion-collapse collapse" role="tabpanel"
                                data-bs-parent="#faq-1">
                                <div class="accordion-body pt-0">
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                                            dignissimos dolorum ea est eveniet, excepturi illum
                                            in iste iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                            ipsa?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                                            dignissimos dolorum ea est eveniet, excepturi illum
                                            in iste iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                            ipsa?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq-1-3" role="tab" aria-expanded="false">
                                    What are our values?
                                    <div class="accordion-button-toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                            <path d="M6 9l6 6l6 -6"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <div id="faq-1-3" class="accordion-collapse collapse" role="tabpanel"
                                data-bs-parent="#faq-1">
                                <div class="accordion-body pt-0">
                                    <div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                                            dignissimos dolorum ea est eveniet, excepturi illum
                                            in iste iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                            ipsa?
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                                            dignissimos dolorum ea est eveniet, excepturi illum
                                            in iste iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                            ipsa?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- BEGIN PAGE HEADER -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Frequently Asked Questions</h2>
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
        <div class="card card-lg">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <?php if (
                        $this->session->userdata('nama_role') == 'Admin' ||
                        $this->session->userdata('nama_role') == 'Pustakawan'
                    ) { ?>
                        <a href="<?= base_url('Faq/Tambah') ?>" class="btn btn-primary">Tambah</a>
                    <?php } ?>
                </div>
                <div class="space-y-4">
                    <?php $categoryIndex = 1; ?>
                    <?php foreach ($faq_per_kategori as $kategori_nama => $faq_list): ?>
                        <div>
                            <h2 class="mb-3"><?= $categoryIndex ?>. <?= htmlspecialchars($kategori_nama) ?></h2>
                            <div class="list-group">
                                <?php foreach ($faq_list as $faqIndex => $faq): ?>
                                    <div class="d-flex justify-content-between align-items-center list-group-item">
                                        <a href="<?= base_url("Faq/Detail/" . $faq->faq_id) ?>" class="text-decoration-none">
                                            <?= htmlspecialchars($faq->judul_faq) ?>
                                        </a>

                                        <?php if (
                                            $this->session->userdata('nama_role') == 'Admin' || $this->session->userdata('nama_role') == 'Pustakawan'
                                        ): ?>
                                            <div class="dropdown">
                                                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="<?= base_url("Faq/Edit/" . $faq->faq_id) ?>">Edit</a>
                                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#delete-FAQ-<?= $faq->faq_id ?>">Delete</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-FAQ-<?= $faq->faq_id ?>" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="modal-status bg-danger"></div>
                                                <div class="modal-body text-center py-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="icon mb-2 text-danger icon-lg">
                                                        <path d="M12 9v4" />
                                                        <path
                                                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                                                        <path d="M12 16h.01" />
                                                    </svg>
                                                    <h3>Are you sure?</h3>
                                                    <div class="text-secondary">
                                                        Do you really want to delete this item? This action cannot be undone.
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
                                                                <a href="<?= base_url('Faq/Delete/' . $faq->faq_id) ?>"
                                                                    class="btn btn-danger w-100" id="confirmDelete">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->

                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php $categoryIndex++; ?>
                    <?php endforeach; ?>
                </div>


            </div>

        </div>



    </div>
</div>


<!-- <div class="page-body">
    <div class="container-xl">
    
    </div>
</div> -->