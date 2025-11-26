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
                'path'      => '/',
                'icon'      => 'activity',
                'active'    => 1
            ],
            [
                'name'      => 'Masterdata',
                'path'      => 'masterdata',
                'icon'      => 'columns',
                'active'    => 1
            ],
            [
                'name'      => 'Setting',
                'path'      => 'system',
                'icon'      => 'tool',
                'active'    => 1
            ],
            [
                'name'      => 'Account',
                'path'      => 'user',
                'icon'      => 'user',
                'active'    => 1
            ]
        ];

        $this->db->table('menus')->insertBatch($data);
    }
}
