<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\Team;

class TeamController extends BaseController
{
    protected $teamModel;

    public function __construct()
    {
        $this->teamModel = new Team();
    }

    public function index()
    {
        $data = [
            'title' => 'Team',
            'teams' => $this->teamModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('masterdata/team/index', $data);
    }

    public function create()
    {
        return view('masterdata/team/create', [
            'title' => 'Tambah Anggota Team'
        ]);
    }

    public function store()
    {
        $rules = [
            'name'     => 'required|min_length[3]',
            'position' => 'required|min_length[3]',
            'photo'    => 'mime_in[photo,image/png,image/jpg,image/jpeg]|max_size[photo,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', $this->validator->listErrors())->withInput();
        }

        // Upload photo
        $photoName = null;
        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('uploads/team', $photoName);
        }

        $this->teamModel->insert([
            'name'          => $this->request->getPost('name'),
            'position'      => $this->request->getPost('position'),
            'bio'           => $this->request->getPost('bio'),
            'instagram_url' => $this->request->getPost('instagram_url'),
            'linkedin_url'  => $this->request->getPost('linkedin_url'),
            'twitter_url'   => $this->request->getPost('twitter_url'),
            'photo'         => $photoName,
        ]);

        return redirect()->to('/adm/masterdata/team')->with('success', 'Anggota team berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $team = $this->teamModel->find($id);

        if (! $team) {
            return redirect()->to('/adm/masterdata/team')->with('error', 'Data tidak ditemukan.');
        }

        return view('masterdata/team/edit', [
            'title' => 'Edit Anggota Team',
            'team'  => $team
        ]);
    }

    public function update($id)
    {
        $rules = [
            'name'     => 'required|min_length[3]',
            'position' => 'required|min_length[3]',
            'photo'    => 'mime_in[photo,image/png,image/jpg,image/jpeg]|max_size[photo,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', $this->validator->listErrors())->withInput();
        }

        $team = $this->teamModel->find($id);

        if (! $team) {
            return redirect()->to('/adm/masterdata/team')->with('error', 'Data tidak ditemukan.');
        }

        $photoName = $team->photo;

        // Replace photo kalau upload baru
        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('uploads/team', $photoName);

            // Delete file lama
            if ($team->photo && file_exists('uploads/team/' . $team->photo)) {
                unlink('uploads/team/' . $team->photo);
            }
        }

        $this->teamModel->update($id, [
            'name'          => $this->request->getPost('name'),
            'position'      => $this->request->getPost('position'),
            'bio'           => $this->request->getPost('bio'),
            'instagram_url' => $this->request->getPost('instagram_url'),
            'linkedin_url'  => $this->request->getPost('linkedin_url'),
            'twitter_url'   => $this->request->getPost('twitter_url'),
            'photo'         => $photoName,
        ]);

        return redirect()->to('/adm/masterdata/team')->with('success', 'Data team berhasil diperbarui.');
    }

    public function delete($id)
    {
        $team = $this->teamModel->find($id);

        if ($team && $team->photo && file_exists('uploads/team/' . $team->photo)) {
            unlink('uploads/team/' . $team->photo);
        }

        $this->teamModel->delete($id);

        return redirect()->to('/adm/masterdata/team')->with('success', 'Anggota team berhasil dihapus.');
    }
}