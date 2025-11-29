<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\Faq;

class FaqController extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new Faq();
    }

    public function index()
    {
        $data = [
            'title' => 'Master FAQ',
            'faqs'  => $this->faqModel->orderBy('sort_order','ASC')->findAll(),
        ];
        return view('masterdata/faqs/index', $data);
    }

    public function create()
    {
        return view('masterdata/faqs/create', [
            'title' => 'Tambah FAQ'
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $this->faqModel->insert($data);

        return redirect()->to('adm/masterdata/faqs')->with('success', 'FAQ berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['faq']   = $this->faqModel->find($id);
        $data['title'] = 'Edit FAQ';
        
        return view('masterdata/faqs/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $this->faqModel->update($id, $data);

        return redirect()->to('adm/masterdata/faqs')->with('success', 'FAQ berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->faqModel->delete($id);

        return redirect()->to('adm/masterdata/faqs')->with('success', 'FAQ berhasil dihapus');
    }
}