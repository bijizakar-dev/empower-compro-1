<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\ContactRequest;
use App\Models\Masterdata\Service;

class ContactRequestController extends BaseController
{
    protected $contactModel;
    protected $serviceModel;

    public function __construct()
    {
        $this->contactModel = new ContactRequest();
        $this->serviceModel = new Service();
    }

    public function index()
    {
        $requests = $this->contactModel
            ->select('contact_requests.*, services.title AS service_name')
            ->join('services', 'services.id = contact_requests.service_id', 'left')
            ->orderBy('contact_requests.id', 'DESC')
            ->findAll();

        return view('contact_request/index', [
            'title'    => 'Contact Request',
            'requests' => $requests
        ]);
    }

    public function detail($id)
    {
        $data = $this->contactModel
            ->select('contact_requests.*, services.title AS service_name')
            ->join('services', 'services.id = contact_requests.service_id', 'left')
            ->where('contact_requests.id', $id)
            ->first();

        if (!$data) {
            return redirect()->to('/adm/contact-request')->with('error', 'Data tidak ditemukan');
        }

        return view('contact_request/detail', [
            'title' => 'Detail Contact Request',
            'data'  => $data
        ]);
    }

    public function delete($id)
    {
        $this->contactModel->delete($id);

        return redirect()->to('adm/contact-request')->with('success', 'Contact Request berhasil dihapus!');
    }
}