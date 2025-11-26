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
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Dikirim</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Layanan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            <?php foreach ($requests as $r): ?>
                            <tr>
                                <td><?= $r['created_at'] ?></td>
                                <td><?= esc($r['name']) ?></td>
                                <td><?= esc($r['email']) ?></td>
                                <td><?= esc($r['phone']) ?></td>
                                <td><?= esc($r['service_name'] ?? '-') ?></td>
                                <td>
                                    <div class="text-center mt-auto ">
                                        <a href="<?= base_url('adm/contact-request/detail/' . $r['id']) ?>" 
                                            class="btn btn-sm btn-primary">
                                            Detail
                                        </a>
                                        <a href="#" 
                                            data-url="<?= base_url('adm/contact-request/delete/' . $r['id']) ?>"
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