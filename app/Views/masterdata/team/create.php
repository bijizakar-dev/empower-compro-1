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
                            <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/team') ?>" class="btn btn-sm btn-light text-primary">
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

                <form action="<?= base_url('adm/masterdata/team/store') ?>" method="POST" enctype="multipart/form-data">

                    <!-- NAMA -->
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- POSISI -->
                    <div class="mb-3">
                        <label class="form-label">Posisi</label>
                        <input type="text" name="position" class="form-control" required>
                    </div>

                    <!-- FOTO -->
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="photo" accept="image/*" class="form-control">
                    </div>

                    <!-- BIO -->
                    <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" rows="4"></textarea>
                    </div>

                    <!-- INSTAGRAM -->
                    <div class="mb-3">
                        <label class="form-label">Instagram URL</label>
                        <input type="text" name="instagram_url" class="form-control">
                    </div>

                    <!-- LINKEDIN -->
                    <div class="mb-3">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="text" name="linkedin_url" class="form-control">
                    </div>

                    <!-- TWITTER -->
                    <div class="mb-3">
                        <label class="form-label">Tiktok URL</label>
                        <input type="text" name="twitter_url" class="form-control">
                    </div>

                    <!-- SUBMIT -->
                    <button type="submit" class="btn btn-primary">
                        <i data-feather="save" class="me-1"></i> Simpan
                    </button>

                </form>
            </div>
        </div>

    </div>
</main>

<?= $this->endSection() ?>