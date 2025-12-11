<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Empower Compro</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    .service-item {
        border-radius: 12px;
        transition: 0.3s all ease;
    }

    .service-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .service-icon i {
        font-size: 48px;
        color: #4b4efc;
    }
</style>

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="layers"></i></div>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/service/create') ?>" 
                           class="btn btn-sm btn-light text-primary">
                            <i class="me-1" data-feather="plus"></i>
                            Tambah Service
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">

                <div class="container-fluid px-4">
                    <h2>ID</h2>
                    <div class="row">
                        <?php foreach ($services_id as $row): ?>
                        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="card shadow-sm h-100 service-item p-3">

                                <div class="service-icon text-center mb-3">
                                    <i class="<?= $row->icon ?> fs-1 text-secondary"></i>
                                </div>

                                <div class="service-content text-center">
                                    <h4 class="fw-bold"><?= esc($row->title) ?></h4>

                                    <p class="text-muted small">
                                        <?= character_limiter(strip_tags($row->description), 120) ?>
                                    </p>

                                    <div class="mb-2">
                                        <span class="badge <?= $row->active ? 'bg-green-soft text-green' : 'bg-red-soft text-red' ?>">
                                            <?= $row->active ? 'Aktif' : 'Nonaktif' ?>
                                        </span>
                                    </div>

                                    <div class="mt-3">
                                        <a href="<?= base_url('adm/masterdata/service/edit/' . $row->id) ?>" 
                                        class="btn btn-sm btn-primary me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="#" 
                                            data-url="<?= base_url('adm/masterdata/service/delete/' . $row->id) ?>"
                                            class="btn btn-sm btn-danger btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <h2 class="mt-3">EN</h2>
                    <div class="row">
                        <?php foreach ($services_en as $row): ?>
                        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="card shadow-sm h-100 service-item p-3">

                                <div class="service-icon text-center mb-3">
                                    <i class="<?= $row->icon ?> fs-1 text-secondary"></i>
                                </div>

                                <div class="service-content text-center">
                                    <h4 class="fw-bold"><?= esc($row->title) ?></h4>

                                    <p class="text-muted small">
                                        <?= character_limiter(strip_tags($row->description), 120) ?>
                                    </p>

                                    <div class="mb-2">
                                        <span class="badge <?= $row->active ? 'bg-green-soft text-green' : 'bg-red-soft text-red' ?>">
                                            <?= $row->active ? 'Aktif' : 'Nonaktif' ?>
                                        </span>
                                    </div>

                                    <div class="mt-3">
                                        <a href="<?= base_url('adm/masterdata/service/edit/' . $row->id) ?>" 
                                        class="btn btn-sm btn-primary me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="#" 
                                            data-url="<?= base_url('adm/masterdata/service/delete/' . $row->id) ?>"
                                            class="btn btn-sm btn-danger btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // cegah default link
                const url = this.dataset.url;

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data service ini akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke URL hapus
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>

<?= $this->endSection() ?>