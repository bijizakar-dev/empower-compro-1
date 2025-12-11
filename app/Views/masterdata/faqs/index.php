<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Empower Compro</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main>
    <!-- Header -->
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
                        <a href="<?= base_url('adm/masterdata/faqs/create') ?>" 
                           class="btn btn-sm btn-light text-primary">
                            <i class="me-1" data-feather="plus"></i>
                            Tambah FAQ
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="container-fluid px-4">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="table-active">
                                <td colspan="5"><strong>Bahasa Indonesia (ID)</strong></td>
                            </tr>
                            <?php foreach ($faqs_id as $f): ?>
                            <tr>
                                <td><?= esc($f['sort_order']) ?></td>
                                <td><?= esc($f['question']) ?></td>
                                <td><?= esc($f['answer']) ?></td>
                                <td>
                                    <?= $f['is_active'] ? 
                                        '<span class="badge bg-success">Aktif</span>' :
                                        '<span class="badge bg-secondary">Nonaktif</span>' ?>
                                </td>
                                <td>
                                    <div class="text-center d-flex gap-2 justify-content-center">

                                        <a href="<?= base_url('adm/masterdata/faqs/edit/' . $f['id']) ?>" 
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="#" 
                                           data-url="<?= base_url('adm/masterdata/faqs/delete/' . $f['id']) ?>"
                                           class="btn btn-sm btn-danger btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <tr colspan="5" class="table-active">
                                <td colspan="5"><strong>Bahasa Inggris (EN)</strong></td>
                            </tr>
                            <?php foreach ($faqs_en as $f): ?>
                            <tr>
                                <td><?= esc($f['sort_order']) ?></td>
                                <td><?= esc($f['question']) ?></td>
                                <td><?= esc($f['answer']) ?></td>
                                <td>
                                    <?= $f['is_active'] ? 
                                        '<span class="badge bg-success">Aktif</span>' :
                                        '<span class="badge bg-secondary">Nonaktif</span>' ?>
                                </td>
                                <td>
                                    <div class="text-center d-flex gap-2 justify-content-center">

                                        <a href="<?= base_url('adm/masterdata/faqs/edit/' . $f['id']) ?>" 
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="#" 
                                           data-url="<?= base_url('adm/masterdata/faqs/delete/' . $f['id']) ?>"
                                           class="btn btn-sm btn-danger btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</main>

<!-- Delete Confirmation -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Hapus FAQ?',
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