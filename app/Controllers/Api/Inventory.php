<?php

namespace App\Controllers\Api;

use App\Models\Inventory\ItemWarehouse;
use App\Models\Masterdata\Item;
use App\Models\Masterdata\Supplier;
use App\Models\Masterdata\SupplierContact;
use App\Models\Masterdata\Unit;
use App\Models\Masterdata\Warehouse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Inventory extends ResourceController
{
    private $limit;
    private $m_item;
    private $m_warehouse;
    private $m_unit;
    private $m_supplier;
    private $m_supplier_contact;
    private $m_item_warehouse;

    function __construct() {
        $this->limit = 10;
        $this->m_item = new Item();
        $this->m_warehouse = new Warehouse();
        $this->m_unit = new Unit();
        $this->m_supplier = new Supplier();
        $this->m_supplier_contact = new SupplierContact();
        $this->m_item_warehouse = new ItemWarehouse();
    }

    private function start($page){
        return (($page - 1) * $this->limit);
    }

    /* BARANG GUDANG / ITEMS WAREHOUSE */
    function getListItem(): ResponseInterface {
        if(!$this->request->getVar('page')){
            return $this->respond(NULL, 400);
        }

        $search = array(
            'search'            => $this->request->getVar('search'),
            'name'              => $this->request->getVar('name'),
            'code'              => $this->request->getVar('code'),
            'id_item'           => $this->request->getVar('id_item'),
            'id_warehouse'      => $this->request->getVar('id_warehouse'),
            'id_factory'        => $this->request->getVar('id_factory'),
            'active'            => 1,
        );

        $start = $this->start($this->request->getVar('page'));

        $data = $this->m_item_warehouse->get_list_item_warehouse($this->limit, $start, $search);

        $data['page'] = (int)$this->request->getVar('page');
        $data['limit'] = $this->limit;

        if($data){
            return $this->respond($data, 200); 
        }else{
            return $this->respond(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    /* BARANG GUDANG / ITEMS WAREHOUSE */

}
