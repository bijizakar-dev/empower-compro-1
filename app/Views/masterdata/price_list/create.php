<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
    <title><?= $title ?> &mdash; Price List</title>
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
                            Tambah Price List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="<?= base_url('adm/masterdata/pricelist') ?>" 
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

                <form action="<?= base_url('adm/masterdata/pricelist/store') ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="package_name" class="form-control" 
                               value="<?= old('package_name') ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga (angka saja)</label>
                        <input type="number" name="price" class="form-control" 
                               value="<?= old('price', 0) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control texteditor" rows="7">
                            <?= old('description') ?>
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fitur (pisahkan dengan enter)</label>
                        <textarea name="features" class="form-control" rows="6">
                            <?= old('features') ?>
                        </textarea>
                        <small class="text-muted">Contoh:<br>- Video 2–3 menit<br>- Kru profesional 3–5 orang</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Popular?</label>
                        <select class="form-select" name="popular">
                            <option value="0">Tidak</option>
                            <option value="1">Ya, Tampilkan Badge</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Simpan</button>

                </form>

            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('.texteditor'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', '|',
                    'link', 'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            })
            .catch(error => console.error(error));
    </script>

</main>

<?= $this->endSection() ?>