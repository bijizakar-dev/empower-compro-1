<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemsMenu extends Seeder
{
    public function run()
    {
        $data = [
            ['id_menu' => 2, 'name' => 'Pegawai',                           'path' => 'masterdata/employee',                'active' => 1],
            ['id_menu' => 2, 'name' => 'Departemen',                        'path' => 'masterdata/department',              'active' => 1],
            ['id_menu' => 2, 'name' => 'Warehouse',                         'path' => 'masterdata/warehouse',               'active' => 1],
            ['id_menu' => 2, 'name' => 'Supplier',                          'path' => 'masterdata/supplier',                'active' => 1],
            ['id_menu' => 2, 'name' => 'Unit',                              'path' => 'masterdata/unit',                    'active' => 1],
            ['id_menu' => 2, 'name' => 'Pabrik',                            'path' => 'masterdata/factory',                 'active' => 1],
            ['id_menu' => 3, 'name' => 'Permintaan Barang',                 'path' => '#',                                  'active' => 1],
            ['id_menu' => 3, 'name' => 'Pemesanan Barang',                  'path' => '#',                                  'active' => 1],
            ['id_menu' => 3, 'name' => 'Penerimaan Barang',                 'path' => '#',                                  'active' => 1],
            ['id_menu' => 3, 'name' => 'Permintaan Penjualan',              'path' => '#',                                  'active' => 1],
            ['id_menu' => 3, 'name' => 'Peminjaman Barang',                 'path' => '#',                                  'active' => 1],
            ['id_menu' => 3, 'name' => 'Pengembalian Barang',               'path' => '#',                                  'active' => 1],
            ['id_menu' => 4, 'name' => 'Barang Gudang',                     'path' => 'inventory/itemWarehouse',            'active' => 1],
            ['id_menu' => 4, 'name' => 'Barang Gudang (Titipan)',           'path' => 'inventory/itemRequestWarehouse',     'active' => 1],
            ['id_menu' => 4, 'name' => 'Barang Pinjam',                     'path' => 'inventory/itemBorrows',              'active' => 1],
            ['id_menu' => 5, 'name' => 'User',                              'path' => 'system/user',                        'active' => 1],
            ['id_menu' => 5, 'name' => 'Role',                              'path' => 'system/role',                        'active' => 1],
            ['id_menu' => 5, 'name' => 'Setting Aplikasi',                  'path' => 'setting-app',                        'active' => 1],
        ];

        $this->db->table('items_menu')->insertBatch($data);
    }
}
