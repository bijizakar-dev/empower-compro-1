<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldtoItemsWarehouse extends Migration
{
    public function up()
    {
        $fields = [
            'id_warehouse' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => true,
            ],
            'id_factory' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => true,
            ],
            'hna' => [
                'type'              => 'DECIMAL(15, 2)',
                'null'              => true,
            ],
            'hpp' => [
                'type'              => 'DECIMAL(15, 2)',
                'null'              => true,
            ],
            'margin' => [
                'type'              => 'DECIMAL(4, 2)',
                'null'              => true,
            ],
        ];

        $this->forge->addForeignKey('id_warehouse', 'warehouses', 'id', 'cascade');
        $this->forge->addForeignKey('id_factory', 'factories', 'id', 'cascade');
        $this->forge->addColumn('items_warehouse', $fields);
    }

    public function down()
    {
        $this->forge->dropForeignKey('warehouses', 'items_warehouse_id_warehouse_foreign');
        $this->forge->dropForeignKey('factories', 'items_warehouse_id_factory_foreign');

        $this->forge->dropColumn('users', 'id_warehouse');
        $this->forge->dropColumn('users', 'id_factory');
        $this->forge->dropColumn('users', 'hna');
        $this->forge->dropColumn('users', 'hpp');
        $this->forge->dropColumn('users', 'margin');
    }
}
