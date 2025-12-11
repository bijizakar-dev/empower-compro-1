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
                            <div class="page-header-icon"><i data-feather="edit"></i></div>
                            Edit Service
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/service') ?>" 
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

                <form action="<?= base_url('adm/masterdata/service/update/' . $service->id) ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">Bahasa</label>
                        <select class="form-select" name="lang">
                            <option value="id" <?= $service->lang == 'id' ? 'selected' : '' ?>>Indonesia (ID)</option>
                            <option value="en" <?= $service->lang == 'en' ? 'selected' : '' ?>>English (EN)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" 
                               value="<?= esc($service->title) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control texteditor" rows="7">
                            <?= esc($service->description) ?>
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Icon Saat Ini</label><br>
                        <i class="<?= esc($service->icon) ?> fs-2"></i>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih / Ganti Icon Baru</label>
                        <div class="input-group">
                            <input type="text" name="icon" id="iconInput" 
                                   class="form-control" 
                                   value="<?= esc($service->icon) ?>">
                            <button type="button" class="btn btn-outline-secondary" 
                                    data-bs-toggle="modal" data-bs-target="#iconPickerModal">
                                Pilih Icon
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" class="form-control" name="sort_order" 
                               value="<?= $service->sort_order ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="active">
                            <option value="1" <?= $service->active ? 'selected' : '' ?>>Aktif</option>
                            <option value="0" <?= !$service->active ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>

    <!-- Modal Icon Picker (sama seperti create) -->
    <div class="modal fade" id="iconPickerModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Pilih Icon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <?php 
                        foreach ($icons as $i): ?>
                            <div class="col-2 text-center">
                                <button type="button" class="btn btn-light w-100 iconSelect" 
                                    data-icon="<?= $i ?>">
                                    <i class="<?= $i ?> fs-3"></i>
                                </button>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        
        const iconInput = document.getElementById("iconInput");
        const iconPreview = document.getElementById("iconPreview");

        document.querySelectorAll(".iconSelect").forEach(btn => {
            btn.addEventListener("click", function() {
                const icon = this.dataset.icon;
                iconInput.value = icon;
                iconPreview.innerHTML = `<i class="${icon} fs-2"></i>`;
                bootstrap.Modal.getInstance(document.getElementById('iconPickerModal')).hide();
            });
        });

        ClassicEditor
            .create( document.querySelector( '.texteditor' ), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', '|',
                    'link', 'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            })
            .catch( error => {
                console.error( error );
            });
    </script>
</main>

<?= $this->endSection() ?>