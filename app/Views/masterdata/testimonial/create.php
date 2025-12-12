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
                            <div class="page-header-icon"><i data-feather="plus-circle"></i></div>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/testimonials') ?>" class="btn btn-sm btn-light text-primary">
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

                <form action="<?= base_url('adm/masterdata/testimonials/store') ?>" method="POST" enctype="multipart/form-data">

                    <!-- NAME -->
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="author_name" class="form-control" required>
                    </div>

                    <!-- COMPANY -->
                    <div class="mb-3">
                        <label class="form-label">Company</label>
                        <input type="text" name="author_company" class="form-control">
                    </div>

                    <!-- JABATAN -->
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="author_title" class="form-control">
                    </div>

                    <!-- PHOTO -->
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="photo" accept="image/*" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Review</label>
                        <textarea name="message" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- RATING -->
                    <div class="mb-3">
                        <label class="form-label">Rating (1–5)</label>
                        <input type="number" name="rating" min="1" max="5" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i data-feather="save" class="me-1"></i> Simpan
                    </button>

                </form>

            </div>
        </div>

    </div>
</main>

<?= $this->endSection() ?>