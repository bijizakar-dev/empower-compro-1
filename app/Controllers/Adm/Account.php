<?php

namespace App\Controllers\Adm;

use App\Controllers\BaseController;
use App\Models\Masterdata\Employee;
use App\Models\System\Role;
use CodeIgniter\HTTP\ResponseInterface;

class Account extends BaseController
{

    public function index() {
        $data['title'] = "User";

        return view('system/user', $data);
    }
    
}
