<?php
namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\Portfolio;
use App\Models\Masterdata\PortfolioMedia;
use App\Models\Masterdata\PortfolioCategory;

class PortfolioController extends BaseController
{
    protected $portfolioModel;
    protected $mediaModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->portfolioModel  = new Portfolio();
        $this->mediaModel      = new PortfolioMedia();
        $this->categoryModel   = new PortfolioCategory();
    }

    /**
     * Index (card grid)
     */
    public function index()
    {
        $category_id = $this->request->getPost('category_id');

        $portfolioModel = new Portfolio();
        $categoryModel  = new PortfolioCategory();

        $data = [
            'title'      => 'Portofolio',
            'portfolios' => $portfolioModel->getAllWithCategory(),
            'categories' => $categoryModel->findAll(),
            'category_id' => $category_id 
        ];

        return view('masterdata/portfolio/index', $data);
    }

    /**
     * Create form
     */
    public function create()
    {
        $categories = $this->categoryModel->orderBy('name','ASC')->findAll();
        return view('masterdata/portfolio/create', [
            'title' => 'Tambah Portfolio',
            'categories' => $categories,
            'validation' => \Config\Services::validation()
        ]);
    }

    /**
     * Store portfolio + thumbnail + optional media files uploaded
     */
    public function store()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'category_id' => 'required|numeric',
            'title'       => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'client_name' => 'permit_empty|max_length[150]',
            'project_date' => 'permit_empty|valid_date',
            'thumbnail'   => 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,5120]',
            'link_url'    => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle thumbnail upload
        $thumbName = null;
        $thumb = $this->request->getFile('thumbnail');
        if ($thumb && $thumb->isValid()) {
            $thumbName = $thumb->getRandomName();
            $thumb->move(WRITEPATH . 'uploads/portfolio/thumbnail', $thumbName);
        }

        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'client_name' => $this->request->getPost('client_name'),
            'project_date'=> $this->request->getPost('project_date') ?: null,
            'thumbnail'   => $thumbName,
            'link_url'    => $this->request->getPost('link_url') ?: null,
        ];

        $id = $this->portfolioModel->insert($data);

        // Handle multiple media uploads (input name="media_files[]")
        $files = $this->request->getFiles();
        if ($this->request->getFiles() && isset($files['media_files'])) {
            foreach ($files['media_files'] as $f) {
                if ($f->isValid() && !$f->hasMoved()) {
                    $newName = $f->getRandomName();
                    $f->move(WRITEPATH . 'uploads/portfolio/media', $newName);

                    $mediaType = $this->detectMediaType($f->getClientMimeType(), $newName);

                    $this->mediaModel->insert([
                        'portfolio_id' => $id,
                        'file_url' => 'storage/portfolio/media/' . $newName, // but we store path or route
                        'media_type' => $mediaType
                    ]);
                }
            }
        }

        session()->setFlashdata('success', 'Portfolio berhasil dibuat');
        return redirect()->to(base_url('adm/masterdata/portfolio'));
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if (!$portfolio) {
            session()->setFlashdata('error','Data tidak ditemukan');
            return redirect()->back();
        }

        $categories = $this->categoryModel->orderBy('name','ASC')->findAll();
        $media = $this->mediaModel->where('portfolio_id',$id)->findAll();

        return view('masterdata/portfolio/edit', [
            'title' => 'Edit Portfolio',
            'portfolio' => $portfolio,
            'categories' => $categories,
            'media' => $media,
            'validation' => \Config\Services::validation()
        ]);
    }

    /**
     * Update portfolio (and thumbnail replace)
     */
    public function update($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if (!$portfolio) {
            session()->setFlashdata('error','Data tidak ditemukan');
            return redirect()->back();
        }

        $validation = \Config\Services::validation();
        $rules = [
            'category_id' => 'required|numeric',
            'title'       => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'client_name' => 'permit_empty|max_length[150]',
            'project_date'=> 'permit_empty|valid_date',
            'thumbnail'   => 'permit_empty|is_image[thumbnail]|max_size[thumbnail,5120]',
            'link_url'    => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // handle thumbnail replacement
        $thumbName = $portfolio->thumbnail;
        $thumb = $this->request->getFile('thumbnail');
        if ($thumb && $thumb->isValid()) {
            $newName = $thumb->getRandomName();
            $thumb->move(WRITEPATH . 'uploads/portfolio/thumbnail', $newName);
            // delete old
            if ($portfolio->thumbnail && is_file(WRITEPATH . 'uploads/portfolio/thumbnail/' . $portfolio->thumbnail)) {
                @unlink(WRITEPATH . 'uploads/portfolio/thumbnail/' . $portfolio->thumbnail);
            }
            $thumbName = $newName;
        }

        $this->portfolioModel->update($id, [
            'category_id' => $this->request->getPost('category_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'client_name' => $this->request->getPost('client_name'),
            'project_date'=> $this->request->getPost('project_date') ?: null,
            'thumbnail'   => $thumbName,
            'link_url'    => $this->request->getPost('link_url') ?: null,
        ]);

        // handle additional media uploads
        if ($this->request->getFiles() && isset($_FILES['media_files'])) {
            foreach ($this->request->getFiles()['media_files'] as $f) {
                if ($f->isValid() && !$f->hasMoved()) {
                    $newName = $f->getRandomName();
                    $f->move(WRITEPATH . 'uploads/portfolio/media', $newName);
                    $mediaType = $this->detectMediaType($f->getClientMimeType(), $newName);
                    $this->mediaModel->insert([
                        'portfolio_id' => $id,
                        'file_url' => 'storage/portfolio/media/' . $newName,
                        'media_type' => $mediaType
                    ]);
                }
            }
        }

        session()->setFlashdata('success', 'Portfolio berhasil diperbarui');
        return redirect()->to(base_url('adm/masterdata/portfolio'));
    }

    /**
     * Delete portfolio (soft)
     */
    public function delete($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if (!$portfolio) {
            session()->setFlashdata('error','Data tidak ditemukan');
            return redirect()->back();
        }

        // optional: delete thumbnail + media files physically
        // but for safety, keep files. If you want to delete physically uncomment below.
        // $mediaList = $this->mediaModel->where('portfolio_id',$id)->findAll();
        // foreach($mediaList as $m) { if (is_file(WRITEPATH.'uploads/portfolio/media/'.basename($m->file_url))) @unlink(...); }
        // if ($portfolio->thumbnail) @unlink(WRITEPATH.'uploads/portfolio/thumbnail/'.$portfolio->thumbnail);

        $this->portfolioModel->delete($id);
        session()->setFlashdata('success','Portfolio berhasil dihapus');
        return redirect()->to(base_url('adm/masterdata/portfolio'));
    }

    /**
     * Upload media (multi-file) for existing portfolio (AJAX or form post)
     */
    public function uploadMedia($portfolioId)
    {
        $portfolio = $this->portfolioModel->find($portfolioId);
        if (!$portfolio) {
            return $this->response->setStatusCode(404)->setJSON(['error'=>'Portfolio not found']);
        }

        if (!$this->request->hasFile('media_files')) {
            return $this->response->setStatusCode(400)->setJSON(['error'=>'No files']);
        }

        $saved = 0;
        foreach ($this->request->getFiles()['media_files'] as $f) {
            if ($f->isValid() && !$f->hasMoved()) {
                $newName = $f->getRandomName();
                $f->move(WRITEPATH . 'uploads/portfolio/media', $newName);
                $mediaType = $this->detectMediaType($f->getClientMimeType(), $newName);
                $this->mediaModel->insert([
                    'portfolio_id' => $portfolioId,
                    'file_url' => 'storage/portfolio/media/' . $newName,
                    'media_type' => $mediaType
                ]);
                $saved++;
            }
        }

        return $this->response->setJSON(['success'=>true,'saved'=>$saved]);
    }

    /**
     * Add media via URL (e.g. YouTube link or image URL)
     */
    public function addMediaUrl($portfolioId)
    {
        $url = $this->request->getPost('media_url');
        $type = $this->request->getPost('media_type') ?: 'image';

        if (empty($url)) {
            session()->setFlashdata('error','URL media kosong');
            return redirect()->back();
        }

        $this->mediaModel->insert([
            'portfolio_id' => $portfolioId,
            'file_url' => $url,
            'media_type' => in_array($type,['image','video']) ? $type : 'image'
        ]);

        session()->setFlashdata('success','Media berhasil ditambahkan');
        return redirect()->back();
    }

    /**
     * Delete media record (and optionally file)
     */
    public function deleteMedia($mediaId)
    {
        $media = $this->mediaModel->find($mediaId);
        if (!$media) {
            session()->setFlashdata('error','Media tidak ditemukan');
            return redirect()->back();
        }

        // if file stored locally, remove file
        if (strpos($media->file_url, 'storage/portfolio/media/') === 0) {
            $fname = basename($media->file_url);
            $path = WRITEPATH . 'uploads/portfolio/media/' . $fname;
            if (is_file($path)) @unlink($path);
        }

        $this->mediaModel->delete($mediaId);
        session()->setFlashdata('success','Media berhasil dihapus');
        return redirect()->back();
    }


    /**
     * Helper: detect media type by mime or filename
     */
    protected function detectMediaType($mime, $filename)
    {
        if (str_contains($mime, 'video') || preg_match('/\.(mp4|mov|webm|avi)$/i', $filename)) {
            return 'video';
        }
        return 'image';
    }
}