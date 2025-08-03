<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;
use Exception;

class Item extends Model
{
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_unit', 'name', 'code', 'active', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    function get_list_item($limit, $start, $search) {
        $q = '';
        // $limit = " limit $start , $limit";

        if ($search['search'] != '') {
            $q .= "AND ( i.name LIKE '%".$search['search']."%' 
                OR i.code LIKE '%".$search['search']."%'
                OR u.name LIKE '%".$search['search']."%' ) ";
        }

        if ($search['code'] != '') {
            $q .= "AND i.code LIKE '%".$search['code']."%' ";
        }
        if ($search['name'] != '') {
            $q .= "AND i.name LIKE '%".$search['name']."%' ";
        }
        if ($search['id_unit'] != '') {
            $q .= "AND i.id_unit LIKE '%".$search['id_unit']."%' ";
        }
        if ($search['active'] != '') {
            $q .= "AND i.active LIKE '%".$search['active']."%' ";
        }

        $select = "SELECT i.*, u.name as unit_name ";
        $sql = " FROM items i  
                JOIN units u ON (i.id_unit = u.id)
                WHERE i.deleted_at is null 
                $q order by i.name asc ";

        $query = $this->query($select.$sql);
        $result['data'] = $query->getResult();

        $count = "SELECT count(*) as count ";
        $result['jumlah'] = $this->query($count.$sql)->getRow()->count;

        return $result;
    }
    
    function get_item($id) {
        $sql = "SELECT i.*, u.name as unit_name 
                FROM items i  
                JOIN units u ON (i.id_unit = u.id)
                WHERE i.deleted_at is null 
                    AND i.id = $id 
                LIMIT 1";
                
        return $this->query($sql)->getRow();
    }

    function update_item($param) {
        $data = array(
            'success' => false,
            'message' => '',
            'id' => null
        );
        
        try {
            if (isset($param['id']) && !empty($param['id'])) {
                // Update
                $res = $this->where('id', $param['id'])->update($param['id'], $param);
                if (!$res) {
                    throw new Exception($this->error()['message']);
                }
                $data['id'] = $param['id'];
                $data['message'] = "Berhasil mengubah data Item";
            } else {
                // Insert
                $res = $this->insert($param);
                if (!$res) {
                    throw new Exception($this->error()['message']);
                }
                $data['id'] = $this->insertID();
                $data['message'] = "Berhasil menambahkan data Item";
            }

            $data['success'] = true;
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function delete_item($id) {
        $data = array('deleted_at' => date('Y-m-d H:i:s'));
        
        $res = $this->where('id', $id)->update($id, $data);
        
        return $res;
    }

    function get_all_item(){
        $sql = "SELECT i.* , u.name as unit_name
                FROM items i  
                JOIN units u ON (i.id_unit = u.id)
                WHERE i.deleted_at is null 
                    AND i.active = 1 
                ORDER BY i.name asc ";

        $query = $this->query($sql)->getResult();
        $data =  array();

        foreach ($query as $key => $value) {
            $data[$value->id] = $value->name . ' | ' . $value->code . ' | '. $value->unit_name;
        }

        return $data;
    }
}

