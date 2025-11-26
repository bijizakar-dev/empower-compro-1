<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\PriceList;

class PriceListController extends BaseController
{
    protected $priceList;

    public function __construct()
    {
        $this->priceList = new PriceList();
    }

    public function index()
    {
        $data = [
            'title' => 'Price List',
            'items' => $this->priceList->orderBy('id', 'ASC')->findAll()
        ];

        return view('masterdata/price_list/index', $data);
    }

    public function create()
    {
        return view('masterdata/price_list/create', [
            'title' => 'Tambah Paket'
        ]);
    }

    public function store()
    {
        $this->priceList->save([
            'package_name' => $this->request->getVar('package_name'),
            'price'        => $this->request->getVar('price'),
            'description'  => $this->request->getVar('description'),
            'features'     => json_encode(explode("\n", $this->request->getVar('features'))),
            'popular'      => $this->request->getVar('popular') ? 1 : 0,
        ]);

        return redirect()->to('adm/masterdata/pricelist')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = $this->priceList->find($id);

        return view('masterdata/price_list/edit', [
            'title' => 'Edit Paket',
            'item'  => $item
        ]);
    }

    public function update($id)
    {
        $this->priceList->update($id, [
            'package_name' => $this->request->getVar('package_name'),
            'price'        => $this->request->getVar('price'),
            'description'  => $this->request->getVar('description'),
            'features'     => json_encode(explode("\n", $this->request->getVar('features'))),
            'popular'      => $this->request->getVar('popular') ? 1 : 0,
        ]);

        return redirect()->to('adm/masterdata/pricelist')->with('success', 'Paket berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->priceList->delete($id);

        return redirect()->to('adm/masterdata/pricelist')->with('success', 'Paket berhasil dihapus!');
    }
}