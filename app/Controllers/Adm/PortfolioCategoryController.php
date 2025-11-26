<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\PortfolioCategory;

class PortfolioCategoryController extends BaseController
{
    protected $portfolioCategory;

    public function __construct()
    {
        $this->portfolioCategory = new PortfolioCategory();
    }

    public function index()
    {
        $data = [
            'title' => 'Portfolio Categories',
            'categories' => $this->portfolioCategory->orderBy('id', 'DESC')->findAll()
        ];

        return view('masterdata/portfolio_category/index', $data);
    }

    public function create()
    {
        return view('masterdata/portfolio_category/create', [
            'title' => 'Tambah Portfolio Category'
        ]);
    }

    public function store()
    {
        $this->portfolioCategory->save([
            'name' => $this->request->getPost('name')
        ]);

        session()->setFlashdata('success', 'Kategori berhasil ditambahkan!');
        return redirect()->to(base_url('adm/masterdata/portfolio-category'));
    }

    public function edit($id)
    {
        $category = $this->portfolioCategory->find($id);

        if (!$category) {
            session()->setFlashdata('error', 'Data tidak ditemukan!');
            return redirect()->back();
        }

        return view('masterdata/portfolio_category/edit', [
            'title'     => 'Edit Portfolio Category',
            'category'  => $category
        ]);
    }

    public function update($id)
    {
        $this->portfolioCategory->update($id, [
            'name' => $this->request->getPost('name')
        ]);

        session()->setFlashdata('success', 'Kategori berhasil diperbarui!');
        return redirect()->to(base_url('adm/masterdata/portfolio-category'));
    }

    public function delete($id)
    {
        $this->portfolioCategory->delete($id);

        session()->setFlashdata('success', 'Kategori berhasil dihapus!');
        return redirect()->to(base_url('adm/masterdata/portfolio-category'));
    }
}