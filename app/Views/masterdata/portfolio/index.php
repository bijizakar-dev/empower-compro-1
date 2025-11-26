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
                            <div class="page-header-icon"><i data-feather="layers"></i></div>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/portfolio/create') ?>"
                           class="btn btn-sm btn-light text-primary">
                            <i class="me-1" data-feather="plus"></i>
                            Tambah Portofolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">
        <div class="row">
            <?php foreach($portfolios as $p): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <?php if ($p->thumbnail): ?>
                    <img src="<?= base_url('storage/portfolio/thumbnail/' . $p->thumbnail) ?>" class="card-img-top" alt="<?= esc($p->title) ?>">
                    <?php else: ?>
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:180px;">
                        <i class="bi bi-folder-image fs-1 text-muted"></i>
                    </div>
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($p->title) ?></h5>
                        <p class="card-subtitle mb-2 text-muted"><?= esc($p->client_name) ?> — <?= $p->project_date ? date('d M Y', strtotime($p->project_date)) : '' ?></p>
                        <p class="card-text small"><?= \CodeIgniter\I18n\Time::parse($p->created_at)->humanize() ?></p>

                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div>
                                <a href="<?= base_url('adm/masterdata/portfolio/edit/' . $p->id) ?>" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> &nbsp; Edit
                                </a>
                                <a href="<?= base_url('adm/masterdata/portfolio/delete/' . $p->id) ?>" onclick="return confirm('Hapus portfolio?')" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> &nbsp; Hapus
                                </a>
                            </div>
                            <div>
                                <?php
                                    $catName = '';
                                    foreach ($categories as $cat) {
                                        if ($cat->id == $category_id) {
                                            $catName = $cat->name;
                                            break;
                                        }
                                    }
                                ?>

                                <span class="badge bg-secondary"><?= esc($catName) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>


<script>

    <?php if(session()->getFlashdata('success')): ?>
    Swal.fire({ icon: 'success', title: 'Berhasil', text: '<?= session()->getFlashdata('success') ?>' });
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
    Swal.fire({ icon: 'error', title: 'Gagal', text: '<?= session()->getFlashdata('error') ?>' });
    <?php endif; ?>

</script>

<?= $this->endSection() ?>
