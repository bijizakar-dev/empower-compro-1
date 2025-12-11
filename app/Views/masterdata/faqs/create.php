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
                            <div class="page-header-icon">
                                <i data-feather="help-circle"></i>
                            </div>
                            <?= $title ?>
                        </h1>
                    </div>

                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/faqs') ?>" 
                           class="btn btn-sm btn-light text-primary">
                            <i class="me-1" data-feather="arrow-left"></i> Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">

        <div class="card mb-4">
            <div class="card-body">

                <form action="<?= base_url('adm/masterdata/faqs/store') ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Bahasa</label>
                        <select class="form-select" name="lang">
                            <option value="id">Indonesia (ID)</option>
                            <option value="en">English (EN)</option>
                        </select>
                    </div>
                    <!-- Pertanyaan -->
                    <div class="mb-3">
                        <label class="form-label">Pertanyaan</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>

                    <!-- Jawaban -->
                    <div class="mb-3">
                        <label class="form-label">Jawaban</label>
                        <textarea name="answer" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Urutan -->
                    <div class="mb-3">
                        <label class="form-label">Urutan Tampil</label>
                        <input type="number" name="sort_order" class="form-control" value="0">
                    </div>

                    <!-- Aktif / Tidak -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" checked>
                        <label class="form-check-label">Tampilkan FAQ ini</label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">
                        <i data-feather="save" class="me-1"></i> Simpan
                    </button>

                </form>

            </div>
        </div>

    </div>
</main>

<?= $this->endSection() ?>