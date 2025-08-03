<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;

class Factory extends Model
{
    protected $table            = 'factories';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['name', 'address', 'phone', 'active', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    function get_list_factory($limit, $start, $search) {
        $q = '';
        $limit = " limit $start , $limit";

        if ($search['search'] != '') {
            $q .= "AND name LIKE '%".$search['search']."%'";
        }

        $count = "SELECT COUNT(id) as count ";
        $select = "SELECT *";
        $sql = " FROM factories 
                WHERE deleted_at is null  
                $q order by name asc ";

        $query = $this->query($select.$sql);
        $result['data'] = $query->getResult();
        $result['jumlah'] = intval($this->query($count.$sql)->getRow()->count);

        return $result;
    }

    function get_factory($id) {
        $sql = "SELECT * FROM factories WHERE id = $id ";
        return $this->query($sql)->getRow();
    }

    function update_factory($data) {
        $data['success'] = false;
        $data['message'] = '';

        if ($data['id']) {
            // Update
            $data['success'] = true;
            $this->where('id', $data['id'])->update($data['id'], $data);
            $data['id'] = $data['id'];
            
        }else{
            // insert
            $data['success'] = true;
            $this->insert($data);
            $data['id'] = $this->insertID();
        }
        
        return $data;
    }

    function delete_factory($id) {
        $data = array('deleted_at' => date('Y-m-d H:i:s'));
        
        $res = $this->where('id', $id)->update($id, $data);
        
        return $res;
    }

    function get_all_factory(){
        $sql = "SELECT f.*
                FROM factories f
                WHERE f.deleted_at is null 
                    AND f.active = 1 
                ORDER BY f.name asc ";

        $query = $this->query($sql)->getResult();
        $data =  array();

        foreach ($query as $key => $value) {
            $data[$value->id] = $value->name;
        }

        return $data;
    }
}
