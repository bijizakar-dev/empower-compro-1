<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\System\Setting as SettingModel;

class Setting extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index()
    {
        $setting = $this->settingModel->first();

        if (!$setting) {
            $setting = (object)[
                "id" => "",
                "site_name" => "",
                "logo" => "",
                "contact_email" => "",
                "contact_phone" => "",
                "address" => "",
                "social_facebook" => "",
                "social_instagram" => "",
                "social_youtube" => "",
                "active" => 1
            ];
        }

        return view('system/setting', [
            'title' => 'Settings',
            'setting' => $setting,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function update()
    {
        $validation = \Config\Services::validation();

        // RULES
        $rules = [
            'site_name' => 'required|min_length[3]',
            'contact_email' => 'permit_empty|valid_email',
            'contact_phone' => 'permit_empty|min_length[8]',
            'social_facebook' => 'permit_empty|valid_url',
            'social_instagram' => 'permit_empty|valid_url',
            'social_youtube' => 'permit_empty|valid_url',
            'logo' => 'permit_empty|is_image[logo]|max_size[logo,2048]|mime_in[logo,image/jpg,image/jpeg,image/png]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $id = $this->request->getPost('id');

        $data = [
            'site_name'        => $this->request->getPost('site_name'),
            'contact_email'    => $this->request->getPost('contact_email'),
            'contact_phone'    => $this->request->getPost('contact_phone'),
            'address'          => $this->request->getPost('address'),
            'social_facebook'  => $this->request->getPost('social_facebook'),
            'social_instagram' => $this->request->getPost('social_instagram'),
            'social_youtube'   => $this->request->getPost('social_youtube'),
            'active'           => $this->request->getPost('active') ?? 1,
        ];

        // Upload logo
        $fileLogo = $this->request->getFile('logo');

        if ($fileLogo && $fileLogo->isValid() && !$fileLogo->hasMoved()) {

            // Folder penyimpanan
            $path = WRITEPATH . 'uploads/setting/logo';

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $newName = $fileLogo->getRandomName();
            $fileLogo->move($path, $newName);

            // Ambil setting lama
            $old = $this->settingModel->first();

            // Hapus logo lama
            if ($old && !empty($old->logo)) {
                $oldPath = $path . '/' . $old->logo;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $data['logo'] = $newName;
        }

        // Insert / Update
        if (empty($id)) {
            $this->settingModel->insert($data);
        } else {
            $this->settingModel->update($id, $data);
        }

        return redirect()->back()->with('success', 'Setting berhasil disimpan');
    }
}