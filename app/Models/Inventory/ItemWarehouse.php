<?php

namespace App\Models\Inventory;

use CodeIgniter\Model;

class ItemWarehouse extends Model
{
    protected $table            = 'items_warehouse';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_item', 'id_supplier', 'stock', 'stock_minimum', 'active', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    function get_list_item_warehouse($limit, $start, $search) {
        $q = '';
        $limit = " limit $start , $limit";

        if ($search['search'] != '') {
            $q .= "AND ( i.name LIKE '%".$search['search']."%' 
                OR i.code LIKE '%".$search['search']."%'
                OR w.name LIKE '%".$search['search']."%' 
                OR u.name LIKE '%".$search['search']."%' 
                OR f.name LIKE '%".$search['search']."%' ) ";
        }

        if ($search['code'] != '') {
            $q .= "AND i.code LIKE '%".$search['code']."%' ";
        }
        if ($search['name'] != '') {
            $q .= "AND i.name LIKE '%".$search['name']."%' ";
        }
        if ($search['id_item'] != '') {
            $q .= "AND iw.id_item LIKE '%".$search['id_item']."%' ";
        }
        if ($search['id_warehouse'] != '') {
            $q .= "AND iw.id_warehouse LIKE '%".$search['id_warehouse']."%' ";
        }
        if ($search['id_factory'] != '') {
            $q .= "AND iw.id_factory LIKE '%".$search['id_factory']."%' ";
        }
        if ($search['active'] != '') {
            $q .= "AND iw.active LIKE '%".$search['active']."%' ";
        }

        $select = "SELECT iw.*, i.name as item_name, w.name as warehouse_name, u.name as unit_name, f.name as factory_name ";
        $sql = " FROM items_warehouse iw 
                JOIN items i ON iw.id_item = i.id 
                JOIN units u ON i.id_unit = u.id
                JOIN warehouses w ON iw.id_warehouse = w.id
                JOIN factories f ON iw.id_factory = f.id
                WHERE iw.deleted_at is null 
                $q order by iw.id asc";

        $query = $this->query($select.$sql);
        $result['data'] = $query->getResult();

        $count = "SELECT count(*) as count ";
        $result['jumlah'] = $this->query($count.$sql)->getRow()->count;

        return $result;
    }
    
}
