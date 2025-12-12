<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\Testimonial;

class TestimonialController extends BaseController
{
    protected $testimonialModel;

    public function __construct()
    {
        $this->testimonialModel = new Testimonial();
    }

    public function index()
    {
        return view('masterdata/testimonial/index', [
            'title'        => 'Testimonial',
            'testimonials' => $this->testimonialModel->orderBy('id', 'DESC')->findAll()
        ]);
    }

    public function create()
    {
        return view('masterdata/testimonial/create', [
            'title' => 'Tambah Testimonial'
        ]);
    }

    public function store()
    {
        $rules = [
            'author_name'    => 'required',
            'message'        => 'required',
            'rating'         => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'photo'          => 'mime_in[photo,image/png,image/jpg,image/jpeg]|max_size[photo,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->with('error', $this->validator->listErrors())
                ->withInput();
        }

        // Upload Foto
        $photoName = null;
        $photo = $this->request->getFile('photo');

        if ($photo && $photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'writable/uploads/testimonials', $photoName);
        }

        $this->testimonialModel->insert([
            'author_name'    => $this->request->getPost('author_name'),
            'author_title'   => $this->request->getPost('author_title'),
            'author_company' => $this->request->getPost('author_company'),
            'rating'         => $this->request->getPost('rating'),
            'message'        => $this->request->getPost('message'),
            'photo'          => $photoName,
            'sort_order'     => $this->request->getPost('sort_order') ?? 1,
            'is_active'      => $this->request->getPost('is_active') ?? 1,
        ]);

        return redirect()->to('/adm/masterdata/testimonials')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->testimonialModel->find($id);

        if (! $data) {
            return redirect()->back()->with('error', 'Testimonial tidak ditemukan.');
        }

        return view('masterdata/testimonial/edit', [
            'title'        => 'Edit Testimonial',
            'testimonial'  => $data
        ]);
    }

    public function update($id)
    {
        $rules = [
            'author_name' => 'required|min_length[3]',
            'message'     => 'required|min_length[10]',
            'rating'      => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'photo'       => 'mime_in[photo,image/png,image/jpg,image/jpeg]|max_size[photo,2048]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->with('error', $this->validator->listErrors())
                ->withInput();
        }

        $data = $this->testimonialModel->find($id);
        if (! $data) {
            return redirect()->to('/adm/masterdata/testimonial')->with('error', 'Testimonial tidak ditemukan.');
        }

        // Upload foto baru?
        $photoName = $data->photo;
        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'writable/uploads/testimonials', $photoName);

            // Hapus foto lama
            if ($data->photo && file_exists(ROOTPATH . 'writable/uploads/testimonials/' . $data->photo)) {
                unlink(ROOTPATH . 'writable/uploads/testimonials/' . $data->photo);
            }
        }

        $this->testimonialModel->update($id, [
            'author_name'    => $this->request->getPost('author_name'),
            'author_title'   => $this->request->getPost('author_title'),
            'author_company' => $this->request->getPost('author_company'),
            'rating'         => $this->request->getPost('rating'),
            'message'        => $this->request->getPost('message'),
            'photo'          => $photoName,
            'sort_order'     => $this->request->getPost('sort_order'),
            'is_active'      => $this->request->getPost('is_active') ?? 1,
        ]);

        return redirect()->to('/adm/masterdata/testimonials')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function delete($id)
    {
        $data = $this->testimonialModel->find($id);

        if ($data && $data->photo && file_exists(ROOTPATH . 'writable/uploads/testimonials/' . $data->photo)) {
            unlink(ROOTPATH . 'writable/uploads/testimonials/' . $data->photo);
        }

        $this->testimonialModel->delete($id);

        return redirect()->to('/adm/masterdata/testimonials')->with('success', 'Testimonial berhasil dihapus.');
    }
}