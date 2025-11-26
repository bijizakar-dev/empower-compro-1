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
                        <a href="<?= base_url('adm/contact-request') ?>"
                           class="btn btn-sm btn-light text-primary">
                            <i data-feather="arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4">
        <div class="row">
            
            <div class="card">
            
              <div class="card-body">
            
                <table class="table table-bordered">
                  <tr>
                    <th width="20%">Nama</th>
                    <td><?= esc($data['name']) ?></td>
                  </tr>
            
                  <tr>
                    <th>Email</th>
                    <td><?= esc($data['email']) ?></td>
                  </tr>
            
                  <tr>
                    <th>No. Telp</th>
                    <td><?= esc($data['phone']) ?></td>
                  </tr>
            
                  <tr>
                    <th>Layanan</th>
                    <td><?= esc($data['service_name'] ?? '-') ?></td>
                  </tr>
            
                  <tr>
                    <th>Pesan</th>
                    <td><?= nl2br(esc($data['message'])) ?></td>
                  </tr>
        
                  <tr>
                    <th>Dikirim Pada</th>
                    <td><?= $data['created_at'] ?></td>
                  </tr>
                </table>
            
              </div>
            </div>
        </div>
    </div>

</main>

<?= $this->endSection() ?>