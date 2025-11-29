<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Menus extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'      => 'Dashboard',
                'path'      => 'adm',
                'icon'      => 'activity',
                'active'    => 1
            ],
            [
                'name'      => 'Masterdata',
                'path'      => 'adm/masterdata',
                'icon'      => 'columns',
                'active'    => 1
            ],
            [
                'name'      => 'Setting',
                'path'      => 'adm/setting',
                'icon'      => 'tool',
                'active'    => 1
            ],
            [
                'name'      => 'Account',
                'path'      => 'adm/account',
                'icon'      => 'user',
                'active'    => 1
            ],
            [
                'name'      => 'Contact Request',
                'path'      => 'adm/contact-request',
                'icon'      => 'phone',
                'active'    => 1
            ]
           
        ];

        $this->db->table('menus')->insertBatch($data);
    }
}
