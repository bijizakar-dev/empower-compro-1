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
                            <div class="page-header-icon"><i data-feather="plus"></i></div>
                            Tambah Portfolio
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
        <div class="card">
            <div class="card-body">

                <form action="<?= base_url('adm/masterdata/portfolio/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="title" value="<?= old('title') ?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control texteditor" rows="8"><?= old('description') ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <input type="text" name="client_name" class="form-control" value="<?= old('client_name') ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Project Date</label>
                                <input type="date" name="project_date" class="form-control" value="<?= old('project_date') ?>">
                            </div>

                                <div class="mb-3">
                                <label class="form-label">Upload Media (Multiple)</label>
                                <input type="file" name="media_files[]" multiple class="form-control">
                                <small class="text-muted">Bisa upload gambar (jpg/png) atau video (mp4). Maks 5MB per file.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Add Media via URL</label>
                                <div class="input-group mb-2">
                                    <select name="media_type" class="form-select" style="max-width:120px">
                                        <option value="image">Image</option>
                                        <option value="video">Video</option>
                                    </select>
                                    <input type="text" name="media_url" class="form-control" placeholder="https://...">
                                    <button class="btn btn-light" formaction="<?= base_url('adm/masterdata/portfolio/media-add-url/0') ?>" formmethod="post">Tambah</button>
                                </div>
                                <small class="text-muted">Masukkan URL gambar atau link video (YouTube)</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach($categories as $c): ?>
                                    <option value="<?= $c->id ?>"><?= esc($c->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control">
                                <small class="text-muted">Ukuran max 5MB. Akan digunakan sebagai cover.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Preview Thumbnail</label>
                                <div id="thumbPreview" class="border p-2 text-center">No thumbnail</div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan Portfolio</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        ClassicEditor.create(document.querySelector('.texteditor')).catch(e=>console.error(e));
    });

    // thumbnail preview
    document.querySelector('input[name="thumbnail"]')?.addEventListener('change', function(e){
        const f = e.target.files[0];
        if (!f) return;
        const url = URL.createObjectURL(f);
        document.getElementById('thumbPreview').innerHTML = `<img src="${url}" class="img-fluid">`;
    });
</script>

<?= $this->endSection() ?>