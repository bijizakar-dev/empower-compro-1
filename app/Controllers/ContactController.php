<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactRequest;
use App\Models\Masterdata\Service;

class ContactController extends BaseController
{
    protected $contactModel;
    protected $serviceModel;

    public function __construct()
    {
        $this->contactModel = new ContactRequest();
        $this->serviceModel = new Service();
    }

    public function send()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name'       => 'required|min_length[3]',
            'email'      => 'required|valid_email',
            'phone'      => 'required|min_length[5]',
            'service_id' => 'required|integer',
            'message'    => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => implode("<br>", $validation->getErrors())
            ]);
        }

        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'service_id' => $this->request->getPost('service_id'),
            'message'    => $this->request->getPost('message'),
        ];

        $this->contactModel->insert($data);

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Pesan Anda telah terkirim!'
        ]);
    }
}