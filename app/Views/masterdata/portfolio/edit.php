<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title><?= $title ?> — Empower Compro</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="edit"></i></div>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/portfolio') ?>"
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

            <!-- FORM LEFT -->
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">

                        <form action="<?= base_url('adm/masterdata/portfolio/update/' . $portfolio->id) ?>"
                              method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="category_id" class="form-select" required>
                                    <?php foreach ($categories as $c): ?>
                                        <option value="<?= $c->id ?>"
                                            <?= $portfolio->category_id == $c->id ? 'selected' : '' ?>>
                                            <?= esc($c->name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="title" value="<?= esc($portfolio->title) ?>"
                                       class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control texteditor"
                                          rows="8"><?= esc($portfolio->description) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <input type="text" name="client_name"
                                       class="form-control"
                                       value="<?= esc($portfolio->client_name) ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Project Date</label>
                                <input type="date" name="project_date"
                                       class="form-control"
                                       value="<?= $portfolio->project_date ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Link URL Project</label>
                                <input type="text" name="link_url"
                                       class="form-control"
                                       value="<?= esc($portfolio->link_url) ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload Media (boleh banyak)</label>
                                <input type="file" name="media_files[]" multiple class="form-control">
                                <small class="text-muted">Anda dapat menambah banyak media sekaligus.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Add Media via URL</label>
                                <div class="input-group mb-2">
                                    <select name="media_type" class="form-select" style="max-width:120px">
                                        <option value="image">Image</option>
                                        <option value="video">Video</option>
                                    </select>
                                    <input type="text" name="media_url" class="form-control" placeholder="https://...">
                                    <button class="btn btn-secondary"
                                            formaction="<?= base_url('adm/masterdata/portfolio/media-add-url/' . $portfolio->id) ?>"
                                            formmethod="post">
                                        Tambah
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Thumbnail (optional)</label>
                                <input type="file" name="thumbnail" class="form-control">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti thumbnail.</small>
                            </div>

                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </form>

                    </div>
                </div>

                <!-- MEDIA GALLERY -->
                <div class="card">
                    <div class="card-body">
                        <h5>Media</h5>
                        <div class="row">
                            <?php foreach ($media as $m): ?>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <?php if ($m->media_type === 'image'): ?>
                                            <img src="<?= str_starts_with($m->file_url, 'http') ? $m->file_url : base_url($m->file_url) ?>"
                                                 class="card-img-top">
                                        <?php else: ?>
                                            <video controls class="w-100">
                                                <source src="<?= str_starts_with($m->file_url, 'http') ? $m->file_url : base_url($m->file_url) ?>">
                                            </video>
                                        <?php endif; ?>

                                        <div class="card-body d-flex justify-content-between">
                                            <small class="text-muted"><?= $m->media_type ?></small>
                                            <a href="<?= base_url('adm/masterdata/portfolio/media-delete/' . $m->id) ?>"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Hapus media ini?')">
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT INFO -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Thumbnail Saat Ini</label><br>
                            <?php if ($portfolio->thumbnail): ?>
                                <img src="<?= base_url('storage/portfolio/thumbnail/' . $portfolio->thumbnail) ?>"
                                     class="img-fluid rounded">
                            <?php else: ?>
                                <p class="text-muted">Tidak ada thumbnail.</p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">Created at: <?= $portfolio->created_at ?></small><br>
                            <small class="text-muted">Updated at: <?= $portfolio->updated_at ?></small>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
        .create(document.querySelector('.texteditor'))
        .catch(error => console.error(error));
});
</script>

<?= $this->endSection() ?>