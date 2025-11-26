<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemsMenu extends Seeder
{
    public function run()
    {
        $data = [
            ['id_menu' => 2, 'name' => 'Service', 'path' => 'masterdata/service', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Portofolio Category', 'path' => 'masterdata/portofolio_category', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Portofolio', 'path' => 'masterdata/portofolio', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Team', 'path' => 'masterdata/team', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Testimonial', 'path' => 'masterdata/testimonial', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Blog', 'path' => 'masterdata/blog', 'active' => 1]
        ];

        $this->db->table('items_menu')->insertBatch($data);
    }
}
