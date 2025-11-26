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
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/team/create') ?>"
                           class="btn btn-sm btn-light text-primary">
                            <i class="me-1" data-feather="plus"></i>
                            Tambah Anggota Team
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">
        <div class="row">
            <?php foreach ($teams as $t): ?>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100">

                    <!-- FOTO -->
                    <?php if ($t->photo): ?>
                        <img src="<?= base_url('uploads/team/' . $t->photo) ?>" 
                             class="card-img-top" 
                             alt="<?= esc($t->name) ?>"
                             style="height:260px; object-fit:cover;">
                    <?php else: ?>
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height:260px;">
                            <i class="bi bi-person-bounding-box fs-1 text-muted"></i>
                        </div>
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title mb-1"><?= esc($t->name) ?></h5>
                        <p class="text-primary fw-bold mb-2"><?= esc($t->position) ?></p>

                        <p class="small text-muted mb-2">
                            <?= $t->bio ? esc(substr($t->bio, 0, 120)) . '...' : '' ?>
                        </p>

                        <div class="mb-3">
                            <?php if ($t->instagram_url): ?>
                                <a href="<?= $t->instagram_url ?>" target="_blank" class="me-2 text-danger">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ($t->linkedin_url): ?>
                                <a href="<?= $t->linkedin_url ?>" target="_blank" class="me-2 text-primary">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ($t->twitter_url): ?>
                                <a href="<?= $t->twitter_url ?>" target="_blank" class="me-2 text-info">
                                    <i class="bi bi-tiktok"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="mt-auto d-flex justify-content-end">
                            <a href="<?= base_url('adm/masterdata/team/edit/' . $t->id) ?>" 
                               class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i> &nbsp; Edit
                            </a>

                            <button class="btn btn-sm btn-danger btn-delete" style="margin-left: 10px;" 
                                    data-id="<?= $t->id ?>" 
                                    data-name="<?= esc($t->name) ?>">
                                <i class="bi bi-trash"></i> &nbsp; Hapus
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // SweetAlert delete
    $('.btn-delete').on('click', function() {
        let id   = $(this).data('id');
        let name = $(this).data('name');

        Swal.fire({
            title: "Hapus Anggota?",
            text: "Hapus anggota team: " + name + " ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('adm/masterdata/team/delete/') ?>" + "/" + id;
            }
        });
    });

    // Flash messages
    <?php if(session()->getFlashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>'
        });
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= session()->getFlashdata('error') ?>'
        });
    <?php endif; ?>
});
</script>

<?= $this->endSection() ?>