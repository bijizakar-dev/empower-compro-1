<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Masterdata\Department;
use App\Models\Masterdata\Item;
use App\Models\Masterdata\Warehouse;
use App\Models\Masterdata\Factory;
use App\Models\System\ItemMenuPermission;
use CodeIgniter\HTTP\ResponseInterface;

class Inventory extends BaseController
{
    private $m_department;
    private $m_warehouse;
    private $m_item;
    private $m_factory;
    private $m_permission;
    private $id_role_session;

    function __construct() {
        $this->m_department = new Department();
        $this->m_warehouse = new Warehouse();
        $this->m_item = new Item();
        $this->m_permission = new ItemMenuPermission();
        $this->m_factory = new Factory();

        $this->id_role_session = session()->get('id_role') ? session()->get('id_role') : NULL; 
        if($this->id_role_session == NULL) {
            return false;
        }
    }

    public function getItemWarehouse() {
        $data['title']      = "Barang Gudang";

        $data['item']           = $this->m_item->get_all_item();
        $data['factory']        = $this->m_factory->get_all_factory();
        $data['warehouse']      = $this->m_warehouse->get_all_warehouse();

        $data['permissions'] = $this->m_permission->get_permission_rules($this->id_role_session, 'inventory/itemWarehouse'); 
        
        return view('inventory/itemWarehouse', $data);
    }
}
