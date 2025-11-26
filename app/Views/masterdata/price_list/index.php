<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Price List</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    .price-card {
        border-radius: 16px;
        transition: .3s ease;
    }
    .price-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
    .price-header {
        font-size: 32px;
        font-weight: bold;
        color: #2b7a2f;
    }
    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 6px;
        font-size: 14px;
    }
    .feature-item i {
        color: #2ecc71;
        font-size: 18px;
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
                        <a href="<?= base_url('adm/masterdata/pricelist/create') ?>" 
                            class="btn btn-sm btn-light text-primary">
                            <i class="me-1" data-feather="plus"></i>
                            Tambah Paket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">
        <div class="row">

            <?php foreach ($items as $row): ?>
            <?php 
                // Decode fitur
                $features = json_decode($row->features, true) ?? [];
            ?>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card price-card shadow-sm p-3 h-100 d-flex flex-column">

                    <!-- Popular -->
                    <?php if ($row->popular): ?>
                        <div class="text-center mb-2">
                            <span class="badge bg-success text-white">Banyak Diminati</span>
                        </div>
                    <?php endif; ?>

                    <!-- Nama Paket -->
                    <h4 class="fw-bold text-center mb-2"><?= esc($row->package_name) ?></h4>

                    <!-- Harga -->
                    <div class="text-center price-header mb-3">
                        Rp <?= number_format($row->price, 0, ',', '.') ?> <span class="fs-6 text-muted">/paket</span>
                    </div>

                    <!-- Deskripsi -->
                    <p class="text-muted small text-center">
                        <?= character_limiter(strip_tags($row->description), 100) ?>
                    </p>

                    <hr>

                    <!-- Fitur - flex-grow-1 akan mengisi ruang kosong -->
                    <div class="flex-grow-1">
                        <?php foreach ($features as $f): ?>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span><?= esc($f) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Button akan selalu di bawah karena mt-auto -->
                    <div class="text-center mt-auto pt-3">
                        <a href="<?= base_url('adm/masterdata/pricelist/edit/' . $row->id) ?>" 
                        class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <a href="#" 
                        data-url="<?= base_url('adm/masterdata/pricelist/delete/' . $row->id) ?>"
                        class="btn btn-sm btn-danger btn-delete">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>

                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus paket?',
                text: "Data ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    window.location.href = this.dataset.url;
                }
            });
        });
    });
});
</script>

<?= $this->endSection() ?>