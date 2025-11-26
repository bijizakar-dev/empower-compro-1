<?php

namespace App\Controllers\Api;

use App\Models\System\ItemMenu;
use App\Models\System\ItemMenuPermission;
use App\Models\System\Role;
use App\Models\System\User;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class System extends ResourceController
{
    function __construct() {
        $this->limit = 10;
        $this->m_user = new User();
        $this->m_item_menu = new ItemMenu();
    }
    
    private function start($page){
        return (($page - 1) * $this->limit);
    }

    /* USER */
    public function getListUser(): ResponseInterface {
        // if(!$this->request->getVar('page')){
        //     return $this->respond(NULL, 400);
        // }

        $search = array(
            'search'            => $this->request->getVar('search'),
            'active'            => $this->request->getVar('active')
        );

        $start = $this->start($this->request->getVar('page'));

        $data = $this->m_user->get_list_user($this->limit, $start, $search);
        $data['page'] = (int)$this->request->getVar('page');
        $data['limit'] = $this->limit;

        if($data){
            return $this->respond($data, 200); 
        }else{
            return $this->respond(array('error' => 'Data tidak ditemukan'), 404);
        }
    }

    public function getUser(): ResponseInterface {
        if(!$this->request->getVar('id')){
            return $this->respond(NULL, 400);
        }

        $data['data'] = $this->m_user->get_user($this->request->getVar('id'));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if($data){
            return $this->respond($data, 200); 
        }else{
            return $this->respond(array('error' => 'Data tidak ditemukan'), 404);
        }
    }

    public function postUser(): ResponseInterface {
        $id = null;
        if($this->request->getPost('id')){
            $id = $this->request->getPost('id');
        }

        $add = array (
            'id' => $id,
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'active' => $this->request->getPost('active')
        );

        $data = $this->m_user->update_user($add);

        return $this->respond($data, 200);
    }

    public function deleteUser(): ResponseInterface {
        if(!$this->request->getVar('id')){
            return $this->respond(NULL, 400);
        }

        $result = $this->m_user->delete_user($this->request->getVar('id'));

        if($result){
            return $this->respond(array('status' => $result), 200); 
        }else{
            return $this->respond(array('status' => false), 200);
        }
    }

    public function getCheckPasswordUser(): ResponseInterface {
        if(!$this->request->getVar('id')){
            return $this->respond(NULL, 400);
        }

        $idUser         = $this->request->getVar('id');
        $passwordOld    = $this->request->getVar('password');
        
        // Check password by id 
        $checkPw = $this->m_user->check_change_password($idUser, $passwordOld);

        if($checkPw){
            return $this->respond(array('status' => $checkPw), 200); 
        }else{
            return $this->respond(array('status' => false), 200);
        }
    }

    public function postChangePasswordUser(): ResponseInterface {
        if(!$this->request->getPost('id')){
            return $this->respond(NULL, 400);
        }

        $add = array (
            'id' => $this->request->getPost('id'),
            'password' => $this->request->getPost('conf_new_pw')
        );

        $data = $this->m_user->update_change_password($add);

        return $this->respond($data, 200);
    }
    
    /* USER */
}
