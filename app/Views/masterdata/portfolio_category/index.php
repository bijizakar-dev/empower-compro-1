<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Empower Compro</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main>

    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="bi bi-tags"></i></div>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/portfolio-category/create') ?>" 
                           class="btn btn-sm btn-light text-primary">
                            <i class="me-1" data-feather="plus"></i>
                            Tambah Category
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">
        <div class="row">
            <?php foreach ($categories as $row): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        
                        <!-- Nama Kategori -->
                        <h5 class="fw-bold mb-0"><?= esc($row->name) ?></h5>

                        <!-- Tombol Edit & Delete -->
                        <div>
                            <a href="<?= base_url('adm/masterdata/portfolio-category/edit/' . $row->id) ?>" 
                                class="btn btn-sm btn-primary me-1">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <a href="#" 
                                data-url="<?= base_url('adm/masterdata/portfolio-category/delete/' . $row->id) ?>"
                                class="btn btn-sm btn-danger btn-delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
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
    
    <?php if(session()->getFlashdata('success')): ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '<?= session()->getFlashdata('success') ?>',
    });
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '<?= session()->getFlashdata('error') ?>',
    });
    <?php endif; ?>
</script>
    
<?= $this->endSection() ?>