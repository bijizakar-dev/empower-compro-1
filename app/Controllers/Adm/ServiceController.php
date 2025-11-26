<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\Service;

class ServiceController extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new Service();
        $this->icons = [
            "bi bi-camera-reels-fill",
            "bi bi-gear-fill",
            "bi bi-heart-pulse-fill",
            "bi bi-people-fill",
            "bi bi-building-fill",
            "bi bi-star-fill",
            "bi bi-lightning-charge-fill",
            "bi bi-briefcase-fill",
            "bi bi-camera-fill",
            "bi bi-film",
            "bi bi-scissors"
        ];
    }

    /**
     * List data service
     */
    public function index()
    {
        $data = [
            'title'    => 'Services',
            'services' => $this->serviceModel->orderBy('sort_order', 'ASC')->findAll(),
        ];

        return view('masterdata/services/index', $data);
    }

    /**
     * Form create
     */
    public function create()
    {
        return view('masterdata/services/create', [
            'title' => 'Tambah Service',
            'icons' => $this->icons
        ]);
    }

    /**
     * Store new data
     */
    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'sort_order'  => 'required|numeric',
            'active'      => 'required|in_list[0,1]',
            'icon'        => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Validasi tambahan: icon harus diawali “bi ”
        $icon = $this->request->getPost('icon');
        if (!str_starts_with($icon, 'bi ')) {
            return redirect()->back()->withInput()->with('error', 'Format icon tidak valid.');
        }

        $this->serviceModel->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'icon'        => $icon,
            'sort_order'  => $this->request->getPost('sort_order'),
            'active'      => $this->request->getPost('active'),
        ]);

        return redirect()
            ->to('/adm/masterdata/service')
            ->with('success', 'Service berhasil ditambahkan.');
    }

    /**
     * Edit existing data
     */
    public function edit($id)
    {
        $service = $this->serviceModel->find($id);

        if (!$service) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('masterdata/services/edit', [
            'title'   => 'Edit Service',
            'service' => $service,
            'icons'   => $this->icons
        ]);
    }

    /**
     * Update data
     */
    public function update($id)
    {
        $service = $this->serviceModel->find($id);

        if (!$service) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $validation = \Config\Services::validation();

        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'sort_order'  => 'required|numeric',
            'active'      => 'required|in_list[0,1]',
            'icon'        => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $icon = $this->request->getPost('icon');

        if (!str_starts_with($icon, 'bi ')) {
            return redirect()->back()->withInput()->with('error', 'Format icon tidak valid.');
        }

        $this->serviceModel->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'icon'        => $icon,
            'sort_order'  => $this->request->getPost('sort_order'),
            'active'      => $this->request->getPost('active'),
        ]);

        return redirect()
            ->to('/adm/masterdata/service')
            ->with('success', 'Service berhasil diperbarui.');
    }

    /**
     * Soft delete
     */
    public function delete($id)
    {
        $service = $this->serviceModel->find($id);

        if (!$service) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $this->serviceModel->delete($id);

        return redirect()
            ->back()
            ->with('success', 'Service berhasil dihapus.');
    }
}