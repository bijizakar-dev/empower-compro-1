<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title><?= $title ?> — Empower Compro</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="settings"></i></div>
                        <?= $title ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('adm/setting/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <input type="hidden" name="id" value="<?= $setting->id ?>">

                <div class="row">

                    <!-- Site Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Situs</label>
                        <input type="text" class="form-control <?= ($validation->getError('site_name') ? 'is-invalid' : '') ?>" 
                               name="site_name" value="<?= old('site_name', $setting->site_name) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('site_name') ?></div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Kontak</label>
                        <input type="text" class="form-control <?= ($validation->getError('contact_email') ? 'is-invalid' : '') ?>" 
                               name="contact_email" value="<?= old('contact_email', $setting->contact_email) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('contact_email') ?></div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control <?= ($validation->getError('contact_phone') ? 'is-invalid' : '') ?>" 
                               name="contact_phone" value="<?= old('contact_phone', $setting->contact_phone) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('contact_phone') ?></div>
                    </div>

                    <!-- Address -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="address"><?= old('address', $setting->address) ?></textarea>
                    </div>

                    <!-- Social Media -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Facebook</label>
                        <input type="text" class="form-control <?= ($validation->getError('social_facebook') ? 'is-invalid' : '') ?>"
                               name="social_facebook" value="<?= old('social_facebook', $setting->social_facebook) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('social_facebook') ?></div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Instagram</label>
                        <input type="text" class="form-control <?= ($validation->getError('social_instagram') ? 'is-invalid' : '') ?>"
                               name="social_instagram" value="<?= old('social_instagram', $setting->social_instagram) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('social_instagram') ?></div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">YouTube</label>
                        <input type="text" class="form-control <?= ($validation->getError('social_youtube') ? 'is-invalid' : '') ?>"
                               name="social_youtube" value="<?= old('social_youtube', $setting->social_youtube) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('social_youtube') ?></div>
                    </div>

                    <!-- Logo Upload -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Logo Website</label>
                        <input type="file" name="logo" class="form-control <?= ($validation->getError('logo') ? 'is-invalid' : '') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('logo') ?></div>

                        <?php if (!empty($setting->logo)) : ?>
                            <div class="mt-3">
                                <label class="form-label">Preview Logo</label><br>
                                <img src="<?= base_url('storage/setting/logo/' . $setting->logo) ?>"
                                    class="img-thumbnail" width="180">
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i data-feather="save"></i> Simpan
                </button>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>