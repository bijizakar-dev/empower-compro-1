<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemsMenu extends Seeder
{
    public function run()
    {
        $data = [
            ['id_menu' => 2, 'name' => 'Service', 'path' => 'adm/masterdata/service', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Portofolio Category', 'path' => 'adm/masterdata/portofolio-category', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Portofolio', 'path' => 'adm/masterdata/portofolio', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Team', 'path' => 'adm/masterdata/team', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Testimonial', 'path' => 'adm/masterdata/testimonial', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Blog', 'path' => 'adm/masterdata/blog', 'active' => 1],
            ['id_menu' => 2, 'name' => 'Pricelist', 'path' => 'adm/masterdata/pricelist', 'active' => 1],
            ['id_menu' => 2, 'name' => 'FAQ', 'path' => 'adm/masterdata/faqs', 'active' => 1]
        ];

        $this->db->table('items_menu')->insertBatch($data);
    }
}
